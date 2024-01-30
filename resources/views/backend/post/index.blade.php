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
                       
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Category </th>
                                        <th>Sub Category </th>
                                        <th>Title</th>
                                        <th>Thumbnail</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post as $row)
                                    <tr class="text-white">

                                        <td>{{$row->category_bn}}</td>
                                        <td>{{$row->subcategory_bn}}</td>
                                        <td>{{$row->title_bn}}</td>

                                        <td><img src="{{URL::to($row->image)}}"style="height: 80px; width: 80px;"></td>
                                        <td>{{$row->post_date}}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{route('category.edit', $row->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form method="POST" action="{{ route('post.delete', $row->id) }}">
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
        </div>
    </section>
    @endsection
