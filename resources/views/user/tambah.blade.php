@extends('admin.layouts')

@section('title', 'Buat Laporan')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Auth::user()->id}}">
        <label for="laporan" class="form-label">Laporan</label>
        <textarea type="text" name="laporan" id="laporan" placeholder="Masukan laporan" class="form-control" value="{{old('laporan')}}"></textarea>
        <label for="image" class="form-label">Gambar</label>
        <input type="file" name="image" id="image" class="form-control">
        <button type="submit" class="btn btn-primary mt-4">Save</button>
        </form>
    </div>
    

@endsection