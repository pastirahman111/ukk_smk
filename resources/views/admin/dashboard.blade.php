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
                                <h3>150</h3>
                                <p>New Orders</p>
                            </div>
                            <a href="#" class="small-box-footer">
                                Informasi lanjut
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner text-center">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Bounce Rate</p>
                            </div>
                            <a href="#" class="small-box-footer">
                                Informasi lanjut
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner text-center">
                                <h3>44</h3>
                                <p>User Registrations</p>
                            </div>
                            <a href="#" class="small-box-footer">
                                Informasi lanjut
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner text-center">
                                <h3>65</h3>
                                <p>Unique Visitors</p>
                            </div>
                            <a href="#" class="small-box-footer">
                                Informasi lanjut 
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
