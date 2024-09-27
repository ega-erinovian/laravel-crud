@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            {{-- <i class="fas fa-table me-1"></i> --}}
            <a href="{{ route('index.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Foto</th>
                        <th width="280px">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Foto</th>
                        <th width="280px">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($produk as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->jenis }}</td>
                        <td>{{ $p->harga_jual }}</td>
                        <td>{{ $p->harga_beli }}</td>
                        <td>
                            @empty($p->foto)
                                <img src="{{ url('assets/img/uploaded/error-404-monochrome.svg') }}" alt="{{ $p->nama }}" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                            @else
                                <img src="{{ url('assets/img/uploaded') }}/{{ $p->foto }}" alt="{{ $p->nama }}" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                            @endempty
                        </td>
                        <td>
                            <a href="" class="btn btn-sm btn-secondary">Detail</a>
                            <a href="{{ route('index.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
