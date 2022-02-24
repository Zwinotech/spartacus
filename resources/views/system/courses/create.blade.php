@extends('theme.master')

@section('title')
    Create a Course
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Courses</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Courses</li>
                                    <li class="breadcrumb-item active" aria-current="page">Create a Course</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">

                    <div class="col-12">
                        <!-- Basic Forms -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Create a Course</h4>
                            </div>
                             
                            @if($errors->any())
                             <div class='alert alert-danger'>
                             @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                                </div>
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            <!-- /.box-header -->
                            <form action='{{route("courses.store")}}' method='POST' enctype="multipart/form-data">
                              @csrf
                                <div class="box-body">
                                    <h4 class="mt-0 mb-20">1. Course Info:</h4>

                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="{{old('difficulty')}}" name='title'>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" placeholder="{{ old('difficulty') }}" name='slug'>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <input type="text" name ="description" class="form-control" placeholder="{{ old('description') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                         
                                        <select class="form-control" name="course_category_id">
                                        @foreach ($courseCategories as $cat)
                                        <option value="{{$cat->id}}" {{ old('course_category_id') == $cat->id ? 'selected' : ''}}>
                                            {{$cat->name}}
                                        </option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Price</label>
                                        <input type="text" name ="price" class="form-control" placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Difficulty</label>
                                        <input type="text" name ="difficulty" class="form-control" placeholder="{{old('difficulty')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Duration</label>
                                        <input type="text" name ="runtime" class="form-control" placeholder="{{old('runtime')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Video Link</label>
                                        <input type="text" name ="video" class="form-control" placeholder="{{old('video')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Course Graphic</label>
                                        <label class="file">
                                            <input type="file" id="graphic" name="graphic">
                                        </label>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <!--button type="submit" class="btn btn-danger">Cancel</button-->
                                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection
