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
                            <!-- /.box-header -->
                            <form>
                                <div class="box-body">
                                    <h4 class="mt-0 mb-20">1. Course Info:</h4>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Course title">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" placeholder="Enter slug">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" placeholder="Description">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Course Thumbnail</label>
                                        <label class="file">
                                            <input type="file" id="file">
                                        </label>
                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
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
