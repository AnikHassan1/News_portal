@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>District Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit District</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="card ml-10" style="width: 48rem;">
                    <div class="card-body ">
                        <form action="{{route('district.update',$edit->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bangla" class="form-label">District Name Bangla</label>
                                <input type="text" name="District_bn" class="form-control text-black @error('District_bn') is-invalid @enderror" id="bangla" required value="{{$edit->District_bn}}">
                                @error('District_bn')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="English" class="form-label">District Name English</label>
                                <input type="text" name="District_en" class="form-control text-black @error('District_bn') is-invalid @enderror" id="English" required value="{{$edit->District_en}}">
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
</div><!-- /.container-fluid -->
</section>
</div>

@endsection
