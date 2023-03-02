<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Laporan;
use App\Models\Role;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $laporanData = Laporan::count();
        $laporanMasuk = Laporan::where('proses', '!=', 'selesai')->count();
        $laporanSelesai = Laporan::where('proses', 'selesai')->count();
        $masyarakat = User::where('role_id', 3)->count();
        return view('admin.index', ['laporanMasuk' => $laporanMasuk, 'laporanData' => $laporanData, 'laporanSelesai' => $laporanSelesai, 'masyarakat' => $masyarakat]);
    }

    public function pengaduan()
    {
        $pengaduan = Laporan::all();
        return view('admin.pengaduan', ['pengaduan' => $pengaduan]);
    }

    public function admin()
    {
        $usersAdmin = User::where('role_id', '!=', 3)->get();
        return view('admin.admin', ['usersAdmin' => $usersAdmin]);
    }

    public function masyarakat()
    {
        $usersMasyarakat = User::where('role_id', '!=', 1 && 2)->get();
        return view('admin.masyarakat', ['usersMasyarakat' => $usersMasyarakat]);
    }

    public function tanggapan($id)
    {
        $pengaduan = Laporan::where('id', $id)->first();
        return view('admin.tanggapan', ['pengaduan' => $pengaduan]);
    }

    public function tanggapanStore(Request $request)
    {
        DB::table('pengaduan')->where('id', $request->pengaduan_id)->update([
            'proses'=> $request->proses,
        ]);

        $data = $request->all();
        $data['pengaduan_id'] = $request->pengaduan_id;
        Tanggapan::create($data);
        return redirect('pengaduan')->with('status', 'Tanggapan berhasil dikirim');
    }
}
