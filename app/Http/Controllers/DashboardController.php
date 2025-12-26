<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Get dashboard statistics
     */
    public function stats()
    {
        return response()->json([
            'total_projects' => Project::count(),
            'total_articles' => Artikel::count(),
        ]);
    }

    /**
     * Get projects with filtering and sorting
     */
    public function projects(Request $request)
    {
        $query = Project::query();

        // Search
        if ($request->has('search') && $request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        // Sorting
        switch ($request->sort) {
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            case 'title-asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'title-desc':
                $query->orderBy('judul', 'desc');
                break;
            default:
                $query->latest();
        }

        $projects = $query->get()->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->judul,
                'description' => $project->deskripsi,
                'projectLeader' => $project->project_leader,
                'date' => $project->tanggal_selesai?->format('Y-m-d'),
                'image' => $project->gambar ? asset('storage/' . $project->gambar) : null,
            ];
        });

        return response()->json($projects);
    }

    /**
     * Create a new project
     */
    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_leader' => 'required|string|max:100',
            'date' => 'required|date',
            'image' => 'nullable|string', // Base64 image data
        ]);

        // Handle base64 image upload
        $imagePath = null;
        if ($request->image && strpos($request->image, 'data:image') === 0) {
            $imagePath = $this->saveBase64Image($request->image, 'projects');
        }

        // Create project
        $project = Project::create([
            'judul' => $validated['title'],
            'deskripsi' => $validated['description'],
            'project_leader' => $validated['project_leader'],
            'tanggal_selesai' => $validated['date'],
            'gambar' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil dibuat!',
            'project' => [
                'id' => $project->id,
                'title' => $project->judul,
                'description' => $project->deskripsi,
                'projectLeader' => $project->project_leader,
                'date' => $project->tanggal_selesai?->format('Y-m-d'),
                'image' => $project->gambar ? asset('storage/' . $project->gambar) : null,
            ]
        ]);
    }

    /**
     * Get articles with filtering and sorting
     */
    public function articles(Request $request)
    {
        $query = Artikel::query();

        // Search
        if ($request->has('search') && $request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        // Tag/Category filter
        if ($request->has('tag') && $request->tag) {
            $query->whereJsonContains('kategori', $request->tag);
        }

        // Sorting
        switch ($request->sort) {
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            case 'title-asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'title-desc':
                $query->orderBy('judul', 'desc');
                break;
            default:
                $query->latest();
        }

        $articles = $query->get()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->judul,
                'description' => $article->deskripsi,
                'tags' => $article->kategori ?? [],
                'author' => $article->penulis,
                'uploader' => $article->user?->name ?? 'Unknown',
                'date' => $article->tanggal_terbit?->format('Y-m-d'),
                'image' => $article->gambar ? asset('storage/' . $article->gambar) : null,
            ];
        });

        return response()->json($articles);
    }

    /**
     * Create a new article
     */
    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|array',
            'author' => 'nullable|string|max:100',
            'date' => 'required|date',
            'image' => 'nullable|string', // Base64 image data
        ]);

        // Handle base64 image upload
        $imagePath = null;
        if ($request->image && strpos($request->image, 'data:image') === 0) {
            $imagePath = $this->saveBase64Image($request->image, 'artikel');
        }

        // Create article
        $article = Artikel::create([
            'judul' => $validated['title'],
            'deskripsi' => $validated['description'],
            'kategori' => $validated['tags'] ?? [],
            'penulis' => $validated['author'] ?? (Auth::check() ? Auth::user()->name : 'Admin'),
            'tanggal_terbit' => $validated['date'],
            'gambar' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dibuat!',
            'article' => [
                'id' => $article->id,
                'title' => $article->judul,
                'description' => $article->deskripsi,
                'tags' => $article->kategori ?? [],
                'author' => $article->penulis,
                'uploader' => $article->user?->name ?? 'Unknown',
                'date' => $article->tanggal_terbit->format('Y-m-d'),
                'image' => $article->gambar ? asset('storage/' . $article->gambar) : null,
            ]
        ]);
    }

    /**
     * Save base64 image to storage
     */
    private function saveBase64Image($base64Image, $folder)
    {
        // Extract image data from base64 string
        $imageData = explode(',', $base64Image);
        $imageType = explode(';', explode(':', $imageData[0])[1])[0];
        $extension = str_replace('image/', '', $imageType);

        // Generate filename
        $filename = time() . '_' . uniqid() . '.' . $extension;

        // Decode and save
        $imageContent = base64_decode($imageData[1]);
        $path = $folder . '/' . $filename;

        Storage::disk('public')->put($path, $imageContent);

        return $path;
    }
}
