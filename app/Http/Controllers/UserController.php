<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Laporan;
use Carbon\Carbon;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function pengaduan()
    {
        $pengaduan = Laporan::with(['user'])->where('user_id', Auth::user()->id)->get();
        return view('user.pengaduan', ['pengaduan' => $pengaduan]);
    }

    public function pengaduanDetail($id)
    {
        $pengaduan = Laporan::with(['user'])->findOrFail($id);
        $tangap = Tanggapan::where('pengaduan_id',$id)->first();

        return view('user.pengaduan-detail',[
            'item' => $pengaduan,
            'tangap' => $tangap
        ]);
    }

    public function pengaduanTambah()
    {
        return view('user.tambah');
    }

    public function pengaduanStore(Request $request)
    {
        $validated = $request->validate([
            'laporan' => 'required',
        ]);
        
        $request['tanggal'] = Carbon::now()->toDateString();
        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('foto', $newName);
        }

        $request['foto'] = $newName;
        $pengaduan = Laporan::create($request->all());
        return redirect('pengaduan-masyarakat')->with('status', 'Laporan berhasil dibuat');
    }
}
