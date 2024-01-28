@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub District Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Edit Sub District</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="card ml-10" style="width: 48rem;">
                    <div class="card-body ">
                        <form action="{{route('subdistrict.update',$edit->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bangla" class="form-label"> subDistrict Name Bangla</label>
                                <input type="text" name="subDistrict_bn" class="form-control text-black @error('subDistrict_bn') is-invalid @enderror" id="bangla" required value="{{$edit->subDistrict_bn}}">
                                @error('subDistrict_bn')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="English" class="form-label">subDistrict Name English</label>
                                <input type="text" name="subDistrict_en" class="form-control text-black @error('subDistrict_en') is-invalid @enderror" id="English" required value="{{$edit->subDistrict_en}}">
                                @error('subDistrict_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="English" class="form-label">Choose District</label>
                                <select name="district_id" class="form-control" value="{{$edit->district_id}}">
                                    <option value="" disabled="" selected="">==Selected One==</option>
                                    @foreach($dis as $row)
                                    <option value="{{$row->id}}" <?php if($row->id==$edit->district_id) echo"selected" ?>>{{$row->District_bn}} | {{$row->District_en}} </option>
                                    @endforeach
                                </select>
                                @error('district_id')
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
