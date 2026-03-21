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
                        <h3 class="card-title">Edit Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id">Siswa</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $transaksi->user_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="buku_id">Buku</label>
                                <select name="buku_id" id="buku_id" class="form-control">
                                    @foreach ($buku as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $transaksi->buku_id == $item->id ? 'selected' : '' }}>{{ $item->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
                                            value="{{ $transaksi->tanggal_pinjam }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                        <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                                            class="form-control" value="{{ $transaksi->tanggal_kembali }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="menunggu"
                                                {{ $transaksi->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="dipinjam"
                                                {{ $transaksi->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                            <option value="dikembalikan"
                                                {{ $transaksi->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
