@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="m-auto mt-5">
    <h1>Laporan Penugasan</h1>
    <form action="{{route('laporan.store')}}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data" class="border border-rounded px-5 d-flex-justify-content-center flex-row">
        @csrf
        <div class="d-flex flex-row gap-5 mt-5  justify-content-between">
            <label for="nip" class="mt-2 w-25">NIP</label>
            @if($user)
            <input type="text" class="form-control" style="background-color: #f0f0f0" value="{{ $user->nip }}" readonly>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            @endif
        </div>
        <div class="d-flex flex-row gap-5 mt-3 justify-content-between">
            <label for="nip" class="mt-1 w-25">Tempat</label>
            <input type="text" name="tempat_penugasan"  aria-describedby="tempat_penugasan"  class="form-control">
        </div>
        <div class="d-flex flex-row gap-5 mt-3 justify-content-between">
            <label for="nip" class="mt-1 w-25">Sebagai</label>
            <input type="text" name="tugas"  aria-describedby="tugas"  class="form-control">
        </div>
        <div class="d-flex flex-row gap-5 mt-3">
            <label for="nip" class="mt-1 w-25">Tanggal</label>
            <input type="date" name="tanggal"  aria-describedby="tanggal"  class="form-control">
        </div>
        <div class="d-flex flex-row gap-5 mt-3">
            <label for="nip" class="mt-1 w-25">Honor</label>
            <input type="number" id="honor" name="honor" aria-describedby="honor" oninput="calculateFee()"  class="form-control">
        </div>
        <div class="d-flex flex-row gap-5 mt-3">
            <label for="fee" class="w-25 mt-1">Fee</label>
            <input type="number" id="fee" name="fee" readonly aria-describedby="honor" class="form-control" style="background-color: #f0f0f0">
        </div>
        <div style="padding: 20px 0">
            Sialakan kirim Fee ke alamat VA 132165456612354
        </div>
        <div class="d-flex flex-row gap-5">
            <label for="foto" class="w-25 mt-1">foto</label>
            <input type="file"  name="foto" id="foto"  >
        </div>
        <button type="submit" class="btn btn-success w-100 mt-3 mb-5">Simpan</button>
    </form>
</div>
<div>
    <table>
        <thead>
            <th>NIM</th>
            <th>Tempat Penugasan</th>
            <th>Tugas</th>
            <th>Tanggal</th>
            <th>Honor</th>
            <th>Fee</th>
            <th>Foto</th>
        </thead>
        <tbody>
            <tr>
                @foreach ($laporan as $hnr)    
                <th>{{ $hnr->nim}}</th>
                <th>{{ $hnr->tempat_penugasan}}</th>
                <th>{{ $hnr->tugas}}</th>
                <th>{{ $hnr->tanggal}}</th>
                <th>{{ $hnr->honor}}</th>
                <th>{{ $hnr->honor*0.05}}</th>
                <th>
                    @if ($hnr->foto)
                        <img style="max-width:50px; max-height:50px;" src="{{url('foto').'/'.$hnr->foto}}"/>
                    @endif
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function calculateFee() {
        var honor = document.getElementById('honor').value;
        var fee = honor * 0.05;
        document.getElementById('fee').value = fee;
    }
    
    // Initialize fee value when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        calculateFee();
    });
</script>
@endsection