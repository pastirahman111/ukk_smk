@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Transaksi (Peminjaman)</h1>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('transaksi.create') }}" class="btn btn-success">Tambah</a>
                            <div>
                                <a href="{{ route('transaksi.export.excel', request()->query()) }}"
                                    class="btn btn-success mr-2"><i class="fas fa-file-excel"></i>Excel</a>
                                <a href="{{ route('transaksi.export.print', request()->query()) }}" target="_blank"
                                    class="btn btn-danger"><i class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                        <form action="{{ route('transaksi.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-2">
                                <label for="tanggal_mulai" class="mr-2">Dari Tanggal:</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                    value="{{ request('tanggal_mulai') }}">
                            </div>
                            <div class="form-group mr-2">
                                <label for="tanggal_akhir" class="mr-2">Sampai Tanggal:</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                    value="{{ request('tanggal_akhir') }}">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary ml-2">Reset</a>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->nama }}</td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td>{{ $item->tanggal_pinjam }}</td>
                                        <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                                        <td>
                                            @if($item->status == 'menunggu')
                                                <span class="badge badge-warning">Menunggu</span>
                                            @elseif($item->status == 'dipinjam')
                                                <span class="badge badge-primary">Dipinjam</span>
                                            @else
                                                <span class="badge badge-success">Dikembalikan</span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            @if($item->status == 'menunggu')
                                                <form action="{{ route('transaksi.setuju', $item->id) }}" method="POST" class="mr-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Setuju</button>
                                                </form>
                                            @endif

                                            @if($item->status == 'dipinjam')
                                                <form action="{{ route('transaksi.kembalikan', $item->id) }}" method="POST" class="mr-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm">Kembalikan</button>
                                                </form>
                                            @endif

                                            <a href="{{ route('transaksi.edit', $item->id) }}"
                                                class="btn btn-info btn-sm mr-2">Edit</a>
                                            <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
