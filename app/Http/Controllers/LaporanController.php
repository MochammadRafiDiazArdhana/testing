<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(){
     // Mendapatkan pengguna yang sedang login
    $user = Auth::user();

    // Mendapatkan laporan yang terkait dengan pengguna yang sedang login
    $laporans = $user->laporans;
    $laporan =  Laporan::all();

    return view('laporan', compact('laporans', 'user','laporan'));
    }

    public function store(Request $request){
        $request->validate([
            'tempat_penugasan'=>"required|string",
            'tugas'=>"required|string",
            'tanggal'=>"required|date",
            'honor'=>"required|numeric|min:0",
            'fee' => "required|numeric|min:0",
            'foto' => "required|mimes:jpeg,jpg,png,gif",
            'user_id' => "required|exists:users,id"
        ]);
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        // Debugging
        $user_id = $request->input('user_id');
        if(is_null($user_id)) {
            return back()->withErrors(['user_id' => 'User ID tidak ditemukan'])->withInput();
        }

        \Log::info('User ID: ' . $user_id);  // Tambahkan baris ini untuk logging
        
        $honor = str_replace(',', '', $request->input('honor'));
        
        $data = [
            'nim' => $request->input('nim'),
            'tempat_penugasan' => $request->input('tempat_penugasan'),
            'tugas' => $request->input('tugas'),
            'tanggal' => $request->input('tanggal'),
            'honor' => $request->input('honor'),
            'fee' => $request->input('fee'),
            'foto' => $foto_nama,
            Auth::user()->id
        ];
        \Log::info('Data to be saved: ' . json_encode($data));
        Laporan::create($data);

        \Log::info('Laporan created successfully');

        return redirect()->route('laporan')->with("success","Laporan Penugasan berhasil ditambahkan");
    }
}
