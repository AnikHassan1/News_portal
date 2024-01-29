@extends('layouts.app')
@section('content')
<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post Insert Panel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post Insert Panel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Post Insert Panel</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>

                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Title Bangla</label>
                                        <input type="text" class="form-control" name="title_bn" placeholder="Enter Title Bangla">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Title English</label>
                                        <input type="text" class="form-control" name="title_en" placeholder="Enter Title English">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select id="ajax-form" name="cat_id" class="form-control">
                                            <option selected="" disabled="">==Choose One Category==</option>
                                            @foreach($category as $row)
                                            <option value="{{$row->id}}">{{$row->category_bn}} | {{$row->category_en}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Sub Category</label>
                                        <select name="sub_cat_id" class="form-control">
                                            <option selected="" disabled="">==Choose One Sub Category==</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">District</label>
                                        <select name="dis_id" class="form-control">
                                            <option selected="" disabled="">==Choose One District==</option>
                                            @foreach($district as $row)
                                            <option value="{{$row->id}}">{{$row->District_bn}} | {{$row->District_en}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Sub District</label>
                                        <select name="sub_dis_id" class="form-control">
                                            <option selected="" disabled="">==Choose One Sub District==</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="	image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Tags Bangla</label>
                                        <input type="text" class="form-control" name="tags_bn" placeholder="Enter Tags Bangla">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Tags English</label>
                                        <input type="text" class="form-control" name="tags_en" placeholder="Enter Tags English">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Details Bangla</label>
                                    <textarea class="summernote" name="details_bn">
                                        Place <em>some</em> <u>text</u> <strong>here</strong>
                                       </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Details English</label>
                                    <textarea class="summernote" name="details_en">
                                        Place <em>some</em> <u>text</u> <strong>here</strong>
                                       </textarea>
                                </div>
                                <hr>
                                <h4 class="text-center">Extra Option</h4>


                                <div class="row ml-1 mt-3">
                                    <div class="form-check col-md-6">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1">
                                        <label class="form-check-label" for="exampleCheck1">Headline</label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bigthumnail" value="1">
                                        <label class="form-check-label" for="exampleCheck1">General Big Thumbnail</label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section" value="1">
                                        <label class="form-check-label" for="exampleCheck1">First Section</label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section_thumnail" value="1">
                                        <label class="form-check-label" for="exampleCheck1">First Section Big Thumbnail</label>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- Ajax Script Start -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("select[name='cat_id']").on("change", function() {
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        url:"{{url('/get/subcat/')}}/"+cat_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // $("#city").empty();
                            // $.each(data, function(key, value) {
                            //     $("#city").append('<option value="' + value.id + '">' + value.city_name + '</option>');
                            // });
                            console.log(data);
                        },
                    });
                } else {
                    alert("danger");
                }
            });
        });
    </script>
    @endsection
