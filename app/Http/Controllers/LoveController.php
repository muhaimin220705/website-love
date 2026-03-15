<?php

namespace App\Http\Controllers;

use App\Models\Surat; // Pastikan baris ini ada dan benar
use Illuminate\Http\Request;

class LoveController extends Controller
{
    public function index()
    {
        // Mencoba mengambil data pertama dari database
        $surat = Surat::first();

        // Jika database masih kosong, buat data cadangan (fallback) agar tidak error
        if (!$surat) {
            $surat = (object) [
                'dari' => 'Muhaimin',
                'untuk' => 'Seseorang',
                'pesan' => 'I Love You'
            ];
        }

        return view('clients.love', compact('surat'));
    }
}