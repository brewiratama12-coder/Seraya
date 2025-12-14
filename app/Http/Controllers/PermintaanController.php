<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    /**
     * Update status of a permintaan (admin only)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,dispatch,selesai',
        ]);

        $status = $request->input('status');

        $updated = DB::table('permintaan')->where('id', $id)->update(['status' => $status]);

        if (! $updated) {
            return back()->with('error', 'Gagal mengubah status.');
        }

        return back()->with('success', 'Status permintaan diperbarui.');
    }
}
