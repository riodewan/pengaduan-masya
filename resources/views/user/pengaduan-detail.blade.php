@extends('admin.layouts')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
    <div class="px-4 py-3 mb-2 flex bg-white rounded-lg shadow-md dark:text-gray-400   dark:bg-gray-800">

    <div class="text-center flex-1">
    <h1 class="mb-8 font-semibold">Tanggapan</h1>
    <p class="text-gray-800 dark:text-gray-400">

        @if (empty($tangap->tanggapan))
        Belum ada tanggapan
        @else
        {{ $tangap->tanggapan}}
        @endif
    </p>
    </div>
    </div>
    </div>
@endsection