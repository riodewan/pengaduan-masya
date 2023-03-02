@extends('admin.layouts')

@section('title', 'Pengaduan')

@section('content')
<div class="container">
    <div class="d-flex mb-4 justify-content-end">
        <a href="/pengaduan-masyarakat/tambah" class="btn btn-block btn-secondary" style="width:150px">Buat Laporan</a>
    </div>
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Pengaduan</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pengaduan as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>{{$item->laporan}}</td>
                      <td>
                        <img src="{{asset('storage/foto/'.$item->foto)}}" alt="" width="100px">
                      </td>
                      <td><span class="tag tag-success">{{$item->proses}}</span></td>
                      <td>
                        <a href="/pengaduan-masyarakat/{{$item->id}}"><i class="bi bi-eye-fill text-primary"></i></a>
                        <a href="#"><i class="bi bi-x-square text-danger"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</div>

@endsection