@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Isi Dashboard -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <h3>{{ $totalkategori }}</h3>
                                <p>Total Kategori</p>
                            </div>
                            <a href="{{ route('kategori.index') }}" class="small-box-footer">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner text-center">
                                <h3>{{ $totalbuku }}</h3>
                                <p>Total Buku</p>
                            </div>
                            <a href="{{ route('buku.index') }}" class="small-box-footer">
                                View
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner text-center">
                                <h3>{{ $totalsiswa }}</h3>
                                <p>Total Siswa</p>
                            </div>
                            <a href="{{ route('siswa.index') }}" class="small-box-footer">
                                View
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->

                {{-- sontent setelah row --}}

                <!-- /.row (main row) -->
            </div>
        </section>
    </div>
@endsection
