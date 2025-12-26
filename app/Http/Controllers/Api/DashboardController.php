<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Artikel;
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
        $totalProjects = Project::count();
        $totalArticles = Artikel::count();

        return response()->json([
            'total_projects' => $totalProjects,
            'total_articles' => $totalArticles,
        ]);
    }

    /**
     * Get projects for dashboard
     */
    public function projects(Request $request)
    {
        $search = $request->get('search', '');
        $sort = $request->get('sort', 'newest');

        $query = Project::query();

        // Apply search filter
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        // Apply sorting
        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title-asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'title-desc':
                $query->orderBy('judul', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $projects = $query->limit(50)->get();

        $formattedProjects = $projects->map(function($project) {
            $imageUrl = null;
            if ($project->gambar) {
                // If already a full URL, use as is, otherwise prepend storage path
                if (str_starts_with($project->gambar, 'http')) {
                    $imageUrl = $project->gambar;
                } else {
                    // Use relative path for better compatibility
                    $imageUrl = '/storage/' . ltrim($project->gambar, '/');
                }
            }
            
            return [
                'id' => $project->id,
                'title' => $project->judul,
                'description' => $project->deskripsi,
                'date' => $project->tanggal_selesai ? $project->tanggal_selesai->format('Y-m-d') : $project->created_at->format('Y-m-d'),
                'projectLeader' => $project->project_leader ?? ($project->user->name ?? 'Unknown'),
                'image' => $imageUrl,
                'status' => $project->status,
                'location' => $project->lokasi,
                'category' => $project->kategori,
            ];
        });

        return response()->json($formattedProjects);
    }

    /**
     * Get articles for dashboard
     */
    public function articles(Request $request)
    {
        $search = $request->get('search', '');
        $tagFilter = $request->get('tag', '');
        $sort = $request->get('sort', 'newest');

        $query = Artikel::query();

        // Apply search filter
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        // Apply tag filter
        if (!empty($tagFilter)) {
            $query->whereJsonContains('kategori', $tagFilter);
        }

        // Apply sorting
        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title-asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'title-desc':
                $query->orderBy('judul', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $articles = $query->limit(50)->get();

        $formattedArticles = $articles->map(function($article) {
            $imageUrl = null;
            if ($article->gambar) {
                // If already a full URL, use as is, otherwise prepend storage path
                if (str_starts_with($article->gambar, 'http')) {
                    $imageUrl = $article->gambar;
                } else {
                    // Use relative path for better compatibility
                    $imageUrl = '/storage/' . ltrim($article->gambar, '/');
                }
            }
            
            return [
                'id' => $article->id,
                'title' => $article->judul,
                'description' => $article->deskripsi,
                'date' => $article->tanggal_terbit->format('Y-m-d'),
                'tags' => $article->kategori ?? [],
                'author' => $article->penulis,
                'uploader' => $article->user?->name ?? 'Unknown',
                'image' => $imageUrl,
            ];
        });

        return response()->json($formattedArticles);
    }

    /**
     * Store a new project
     */
    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_leader' => 'required|string|max:255',
            'image' => 'nullable|string', // base64 encoded image
        ]);

        $projectData = [
            'judul' => $validated['title'],
            'deskripsi' => $validated['description'],
            'lokasi' => 'Dashboard',
            'kategori' => 'Dashboard Project',
            'status' => 'draft',
            'tanggal_mulai' => now(),
            'user_id' => auth()->id(),
        ];

        // Handle base64 image
        if ($request->has('image') && !empty($validated['image'])) {
            $imageData = $validated['image'];
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $matches)) {
                $imageType = $matches[1];
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $imageData = base64_decode($imageData);

                $filename = 'projects/dashboard_' . time() . '.' . $imageType;
                Storage::disk('public')->put($filename, $imageData);
                $projectData['gambar'] = $filename;
            }
        }

        $project = Project::create($projectData);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil dibuat!',
            'project' => [
                'id' => $project->id,
                'title' => $project->judul,
                'description' => $project->deskripsi,
                'date' => $project->created_at->format('Y-m-d'),
                'projectLeader' => $project->user->name ?? 'Unknown',
                'image' => $project->gambar ? '/storage/' . ltrim($project->gambar, '/') : null,
            ]
        ]);
    }

    /**
     * Store a new article
     */
    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|array',
            'author' => 'nullable|string|max:100',
            'date' => 'required|date',
            'image' => 'nullable|string', // base64 encoded image
        ]);

        $articleData = [
            'judul' => $validated['title'],
            'deskripsi' => $validated['description'],
            'kategori' => $validated['tags'] ?? [],
            'penulis' => $validated['author'] ?? (Auth::check() ? Auth::user()->name : 'Admin'),
            'tanggal_terbit' => $validated['date'],
            'user_id' => Auth::id(),
        ];

        // Handle base64 image
        if ($request->has('image') && !empty($validated['image'])) {
            $imageData = $validated['image'];
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $matches)) {
                $imageType = $matches[1];
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $imageData = base64_decode($imageData);

                $filename = 'artikel/dashboard_' . time() . '_' . uniqid() . '.' . $imageType;
                Storage::disk('public')->put($filename, $imageData);
                $articleData['gambar'] = $filename;
            }
        }

        $article = Artikel::create($articleData);

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dibuat!',
            'article' => [
                'id' => $article->id,
                'title' => $article->judul,
                'description' => $article->deskripsi,
                'date' => $article->tanggal_terbit->format('Y-m-d'),
                'tags' => $article->kategori ?? [],
                'author' => $article->penulis,
                'uploader' => $article->user?->name ?? 'Unknown',
                'image' => $article->gambar ? '/storage/' . ltrim($article->gambar, '/') : null,
            ]
        ]);
    }

    /**
     * Update an existing article
     */
    public function updateArticle(Request $request, $id)
    {
        $article = Artikel::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|array',
            'author' => 'nullable|string|max:100',
            'date' => 'required|date',
            'image' => 'nullable|string', // base64 encoded image or existing image URL
        ]);

        $articleData = [
            'judul' => $validated['title'],
            'deskripsi' => $validated['description'],
            'kategori' => $validated['tags'] ?? [],
            'penulis' => $validated['author'] ?? $article->penulis,
            'tanggal_terbit' => $validated['date'],
        ];

        // Handle base64 image upload
        if ($request->has('image') && !empty($validated['image'])) {
            $imageData = $validated['image'];
            // Check if it's a new base64 image
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $matches)) {
                // Delete old image if exists
                if ($article->gambar && !str_contains($article->gambar, 'http')) {
                    Storage::disk('public')->delete($article->gambar);
                }
                
                $imageType = $matches[1];
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $imageData = base64_decode($imageData);

                $filename = 'artikel/dashboard_' . time() . '_' . uniqid() . '.' . $imageType;
                Storage::disk('public')->put($filename, $imageData);
                $articleData['gambar'] = $filename;
            } else if (str_starts_with($imageData, 'http') || str_starts_with($imageData, '/storage/')) {
                // If it's already a URL, extract the path
                $path = str_replace('/storage/', '', $imageData);
                $path = preg_replace('#^https?://[^/]+/storage/#', '', $path);
                $path = str_replace('/storage/', '', $path);
                $articleData['gambar'] = $path;
            }
        }

        $article->update($articleData);

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil diperbarui!',
            'article' => [
                'id' => $article->id,
                'title' => $article->judul,
                'description' => $article->deskripsi,
                'date' => $article->tanggal_terbit->format('Y-m-d'),
                'tags' => $article->kategori ?? [],
                'author' => $article->penulis,
                'uploader' => $article->user?->name ?? 'Unknown',
                'image' => $article->gambar ? '/storage/' . ltrim($article->gambar, '/') : null,
            ]
        ]);
    }

    /**
     * Delete an article
     */
    public function deleteArticle($id)
    {
        $article = Artikel::findOrFail($id);

        // Delete image if exists
        if ($article->gambar) {
            Storage::disk('public')->delete($article->gambar);
        }

        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dihapus!'
        ]);
    }

    /**
     * Update an existing project
     */
    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_leader' => 'required|string|max:100',
            'date' => 'required|date',
            'image' => 'nullable|string',
        ]);

        $projectData = [
            'judul' => $validated['title'],
            'deskripsi' => $validated['description'],
            'project_leader' => $validated['project_leader'],
            'tanggal_selesai' => $validated['date'],
        ];

        // Handle base64 image upload
        if ($request->has('image') && !empty($validated['image'])) {
            $imageData = $validated['image'];
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $matches)) {
                // Delete old image if exists
                if ($project->gambar && !str_contains($project->gambar, 'http')) {
                    Storage::disk('public')->delete($project->gambar);
                }
                
                $imageType = $matches[1];
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $imageData = base64_decode($imageData);

                $filename = 'projects/dashboard_' . time() . '_' . uniqid() . '.' . $imageType;
                Storage::disk('public')->put($filename, $imageData);
                $projectData['gambar'] = $filename;
            } else if (str_starts_with($imageData, 'http') || str_starts_with($imageData, '/storage/')) {
                // If it's already a URL, extract the path
                $path = str_replace('/storage/', '', $imageData);
                $path = preg_replace('#^https?://[^/]+/storage/#', '', $path);
                $path = str_replace('/storage/', '', $path);
                $projectData['gambar'] = $path;
            }
        }

        $project->update($projectData);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil diperbarui!',
            'project' => [
                'id' => $project->id,
                'title' => $project->judul,
                'description' => $project->deskripsi,
                'projectLeader' => $project->project_leader,
                'date' => $project->tanggal_selesai->format('Y-m-d'),
                'image' => $project->gambar ? '/storage/' . ltrim($project->gambar, '/') : null,
            ]
        ]);
    }

    /**
     * Delete a project
     */
    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);

        // Delete image if exists
        if ($project->gambar) {
            Storage::disk('public')->delete($project->gambar);
        }

        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil dihapus!'
        ]);
    }
}
