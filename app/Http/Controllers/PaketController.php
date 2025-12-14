<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PaketWisata;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');

        $query = PaketWisata::query();
        if ($q) {
            $query->where('nama_paket', 'like', "%{$q}%")
                  ->orWhere('deskripsi', 'like', "%{$q}%");
        }

        $pakets = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.paket_index', compact('pakets', 'q'));
    }

    public function edit($id)
    {
        $paket = PaketWisata::findOrFail($id);
        return view('admin.paket_edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = PaketWisata::findOrFail($id);
        $data = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,tidak_tersedia',
            'gambar' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('paket', 'public');
            // delete old image if exists
            if ($paket->gambar) {
                Storage::disk('public')->delete($paket->gambar);
            }
            $data['gambar'] = $path;
        }

        $paket->update($data);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }
}
