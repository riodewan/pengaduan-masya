@extends('admin.layouts')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="get">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" id="id" class="form-control" placeholder="ID" value="{{$pengaduan->user->nik}}" readonly>
                <label for="laporan" class="form-label">Laporan</label>
                <input type="text" name="laporan" id="laporan" placeholder="laporan" class="form-control" value="{{$pengaduan->laporan}}" readonly>
                <div class="mb-3">
                    <label for="currentCover" class="form-label d-block">Gambar Laporan</label>
                    <img src="{{asset('storage/foto/'.$pengaduan->foto)}}" alt="" width="500px">
                </div>
                </form>
            </div>
            <div class="col-lg-6">
                <form action="/tanggapan/{{$pengaduan->id}}" method="post">
                @csrf
                <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }} ">
                <label for="proses" class="form-label">Proses</label>
                <select name="proses" id="proses" class="form-control">
                    <option value="1">Pending</option>
                    <option value="2">Proses</option>
                    <option value="3">Selesai</option>
                </select>
                <div class="mb-3">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" class="form-control" placeholder="Tanggapan" rows="5" cols="100" value="{{ old('tanggapan')}}"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection