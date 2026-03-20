@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Buku: {{ $buku->judul }}</h1>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Kolom Cover -->
                        <div class="col-md-4">
                            <div class="card card-primary card-outline shadow">
                                <div class="card-body box-profile text-center">
                                    @if($buku->cover)
                                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" class="img-fluid rounded shadow-sm mb-3" style="max-height: 400px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex justify-content-center align-items-center rounded shadow-sm mb-3" style="height: 400px;">
                                            <span class="text-muted"><i class="fas fa-book fa-3x"></i><br>Tidak ada cover</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Detail -->
                        <div class="col-md-8">
                            <div class="card card-primary shadow">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-info-circle mr-1"></i> Informasi Lengkap Buku</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-sm-4 text-muted"><strong><i class="fas fa-book-open mr-2"></i> Judul</strong></div>
                                        <div class="col-sm-8"><span class="h5 m-0">{{ $buku->judul }}</span></div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-4 text-muted"><strong><i class="fas fa-user-edit mr-2"></i> Penulis</strong></div>
                                        <div class="col-sm-8">{{ $buku->penulis }}</div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-4 text-muted"><strong><i class="fas fa-building mr-2"></i> Penerbit</strong></div>
                                        <div class="col-sm-8">{{ $buku->penerbit }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4 text-muted"><strong><i class="fas fa-building mr-2"></i> Kategori</strong></div>
                                        <div class="col-sm-8">{{ $buku->kategori->nama_kategori ?? 'Tidak ada kategori' }}</div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-4 text-muted"><strong><i class="fas fa-calendar-alt mr-2"></i> Tahun Terbit</strong></div>
                                        <div class="col-sm-8">{{ $buku->tahun_terbit }}</div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-4 text-muted"><strong><i class="fas fa-boxes mr-2"></i> Stok Tersedia</strong></div>
                                        <div class="col-sm-8">
                                            @if($buku->stok > 0)
                                                <span class="color-primary" style="font-size: 14px;">{{ $buku->stok }}</span>
                                            @else
                                                <span class="badge badge-danger px-3 py-2" style="font-size: 14px;">Stok Habis</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-light text-right">
                                    <a href="{{ route('buku.index') }}" class="btn btn-secondary mr-2"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
                                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning text-dark font-weight-bold"><i class="fas fa-edit mr-1"></i> Edit Buku</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
