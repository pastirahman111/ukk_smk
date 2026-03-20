@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Siswa</h1>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Siswa</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user_id">Nama Siswa</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection