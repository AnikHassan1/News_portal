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
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="card ml-10" style="width: 48rem;">
                    <div class="card-body ">
                        <form action="{{route('category.update',$edit->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bangla" class="form-label">Category Name Bangla</label>
                                <input type="text" name="category_bn" class="form-control text-black @error('category_bn') is-invalid @enderror" id="bangla" required value="{{$edit->category_bn}}">
                                @error('category_bn')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="English" class="form-label">Category Name English</label>
                                <input type="text" name="category_en" class="form-control text-black @error('category_en') is-invalid @enderror" id="English" required value="{{$edit->category_en}}">
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
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection
