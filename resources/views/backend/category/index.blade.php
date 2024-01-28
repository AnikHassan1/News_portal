@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title">All Categories Table</h3>
                            <button class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default">ADD New Category</button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Category Name Bangla</th>
                                        <th>Category Name English</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach($category as $row)
                                    <tr class="text-white">
                                        <td>{{$row->category_bn}}</td>
                                        <td>{{$row->category_en}}
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{route('category.edit', $row->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form method="POST" action="{{ route('category.delete', $row->id) }}">
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
                            <h4 class="modal-title">Add New Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="bangla" class="form-label">Category Name Bangla</label>
                                    <input type="text" name="category_bn" class="form-control text-black @error('category_bn') is-invalid @enderror" id="bangla" required value="{{old('category_bn')}}">
                                    @error('category_bn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="English" class="form-label">Category Name English</label>
                                    <input type="text" name="category_en" class="form-control text-black @error('category_en') is-invalid @enderror" id="English" required>
                                    @error('category_en')
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
