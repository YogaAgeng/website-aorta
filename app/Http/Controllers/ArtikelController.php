<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::latest()
            ->when(request('search'), function($query) {
                $query->where('judul', 'like', '%' . request('search') . '%')
                      ->orWhere('kategori', 'like', '%' . request('search') . '%');
            })
            ->when(request('kategori'), function($query) {
                $query->where('kategori', request('kategori'));
            })
            ->when(request('status') === 'draft', function($query) {
                $query->where('draft', true);
            })
            ->when(request('status') === 'published', function($query) {
                $query->where('draft', false);
            })
            ->paginate(10);

        $kategori = Artikel::select('kategori')->distinct()->pluck('kategori');

        return view('admin.artikel.index', compact('artikels', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
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
            'penulis' => 'required|string|max:100',
            'draft' => 'boolean',
            'tanggal_terbit' => 'nullable|date',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
            $validated['gambar'] = $path;
        }

        // Set default penulis to current user's name if not provided
        if (empty($validated['penulis'])) {
            $validated['penulis'] = Auth::user()->name;
        }

        // Create the artikel
        $artikel = Auth::user()->artikels()->create($validated);

        return redirect()->route('artikel.index')
            ->with('success', 'Artikel berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        // Increment view count
        $artikel->incrementViews();
        
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        $this->authorize('update', $artikel);
        
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $this->authorize('update', $artikel);
        
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'draft' => 'boolean',
            'tanggal_terbit' => 'nullable|date',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $path = $request->file('gambar')->store('artikel', 'public');
            $validated['gambar'] = $path;
        }

        $artikel->update($validated);

        return redirect()->route('artikel.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $this->authorize('delete', $artikel);
        
        // Delete the image if exists
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        
        $artikel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dihapus!'
        ]);
    }
    
    /**
     * Toggle draft status of the specified resource.
     */
    public function toggleDraft(Artikel $artikel)
    {
        $this->authorize('update', $artikel);
        
        $artikel->update([
            'draft' => !$artikel->draft,
            'tanggal_terbit' => $artikel->draft ? now() : $artikel->tanggal_terbit
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Status draft berhasil diubah!',
            'is_draft' => $artikel->draft
        ]);
    }
}
