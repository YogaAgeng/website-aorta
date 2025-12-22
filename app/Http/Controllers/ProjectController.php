<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()
            ->when(request('search'), function($query) {
                $query->where('judul', 'like', '%' . request('search') . '%')
                      ->orWhere('kategori', 'like', '%' . request('search') . '%')
                      ->orWhere('lokasi', 'like', '%' . request('search') . '%');
            })
            ->when(request('kategori'), function($query) {
                $query->where('kategori', request('kategori'));
            })
            ->when(request('status'), function($query) {
                $query->where('status', request('status'));
            })
            ->when(request('sort') === 'terbaru', function($query) {
                $query->latest();
            })
            ->when(request('sort') === 'terlama', function($query) {
                $query->oldest();
            })
            ->when(request('sort') === 'donasi_tertinggi', function($query) {
                $query->orderBy('donasi_terkumpul', 'desc');
            })
            ->paginate(10);

        $kategori = Project::select('kategori')->distinct()->pluck('kategori');
        $statuses = ['draft', 'berlangsung', 'selesai', 'dibatalkan'];

        return view('admin.project.index', compact('projects', 'kategori', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:draft,berlangsung,selesai,dibatalkan',
            'target_donasi' => 'nullable|numeric|min:0',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('projects', 'public');
            $validated['gambar'] = $path;
        }

        // Set default values
        $validated['donasi_terkumpul'] = 0;
        $validated['user_id'] = Auth::id();

        // Create the project
        $project = Project::create($validated);

        return redirect()->route('project.index')
            ->with('success', 'Project berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);
        
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:draft,berlangsung,selesai,dibatalkan',
            'target_donasi' => 'nullable|numeric|min:0',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($project->gambar) {
                Storage::disk('public')->delete($project->gambar);
            }
            $path = $request->file('gambar')->store('projects', 'public');
            $validated['gambar'] = $path;
        }

        $project->update($validated);

        return redirect()->route('project.index')
            ->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        
        // Delete the image if exists
        if ($project->gambar) {
            Storage::disk('public')->delete($project->gambar);
        }
        
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil dihapus!'
        ]);
    }
    
    /**
     * Update project status.
     */
    public function updateStatus(Request $request, Project $project)
    {
        $this->authorize('update', $project);
        
        $validated = $request->validate([
            'status' => 'required|in:draft,berlangsung,selesai,dibatalkan',
        ]);
        
        $project->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Status project berhasil diubah!',
            'status' => $project->status
        ]);
    }
    
    /**
     * Add donation to project.
     */
    public function addDonation(Request $request, Project $project)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1000',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
            'is_anonymous' => 'boolean',
        ]);
        
        // Here you would typically process the donation through a payment gateway
        // For now, we'll just update the donation amount
        $project->updateDonationAmount($validated['amount']);
        
        // TODO: Send confirmation email, save donor info, etc.
        
        return response()->json([
            'success' => true,
            'message' => 'Terima kasih atas donasi Anda!',
            'donation' => [
                'amount' => $validated['amount'],
                'donasi_terkumpul' => $project->donasi_terkumpul,
                'target_donasi' => $project->target_donasi,
                'percentage' => $project->target_donasi > 0 
                    ? round(($project->donasi_terkumpul / $project->target_donasi) * 100, 2)
                    : 0,
            ]
        ]);
    }
}
