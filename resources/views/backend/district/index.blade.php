@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>District</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">District</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All District Table</h3>
                            <button class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default">ADD New District</button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>District Name Bangla</th>
                                        <th>District Name English</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach($district as $row)
                                    <tr class="text-white">
                                        <td>{{$row->District_bn}}</td>
                                        <td>{{$row->District_en}}
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{route('district.edit', $row->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form method="POST" action="{{ route('district.delete', $row->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->

            <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                <div class="modal-dialog bg-primary">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New District</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('district.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="bangla" class="form-label">District Name Bangla</label>
                                    <input type="text" name="District_bn" class="form-control text-black @error('District_bn') is-invalid @enderror" id="bangla" required value="{{old('District_bn')}}">
                                    @error('District_bn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="English" class="form-label">District Name English</label>
                                    <input type="text" name="District_en" class="form-control text-black @error('District_bn') is-invalid @enderror" id="English" required>
                                    @error('District_bn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
    </section>
    @endsection
