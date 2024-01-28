@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Category Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Sub Category</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="card ml-10" style="width: 48rem;">
                    <div class="card-body ">
                    <form action="{{route('subcategory.update',$edit->id)}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="bangla" class="form-label">SubCategory Name Bangla</label>
                                    <input type="text" name="subcategory_bn" class="form-control text-black @error('subcategory_bn') is-invalid @enderror" id="bangla" required value="{{$edit->subcategory_bn}}">
                                    @error('category_bn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="English" class="form-label">SubCategory Name English</label>
                                    <input type="text" name="subcategory_en" class="form-control text-black @error('subcategory_en') is-invalid @enderror" id="English" value="{{$edit->subcategory_en}}" required>
                                    @error('subcategory_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="English" class="form-label">Choose Category </label>
                                   <select name="category_id"class="form-control"  required>
                                    <option disabled="" selected="">==Selected One==</option>
                                    @foreach($cat as $row)
                                    <option value="{{$row->id}}"<?php if($row->id==$edit->category_id) echo"Selected" ?>>{{$row->category_en}} | {{$row->category_bn}}</option>
                                    @endforeach
                                   </select>

                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                    </div>
                </div>



                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection
