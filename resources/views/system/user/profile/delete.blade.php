@extends('theme.master')

@section('title')
    Delete Profile
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Bootstrap Tables</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Tables</li>
                                    <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
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
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Responsive Hover Table</h4>
                                <div class="box-controls pull-right">
                                    <div class="lookup lookup-circle lookup-right">
                                        <input type="text" name="s">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Invoice</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Country</th>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #123456</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$158.00</td>
                                            <td><span class="badge badge-pill badge-danger">Pending</span></td>
                                            <td>CH</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #458789</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$55.00</td>
                                            <td><span class="badge badge-pill badge-warning">Shipped</span></td>
                                            <td>US</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #84532</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$845.00</td>
                                            <td><span class="badge badge-pill badge-danger">Prossing</span></td>
                                            <td>IG</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #48956</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$145.00</td>
                                            <td><span class="badge badge-pill badge-success">Paid</span></td>
                                            <td>EN</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #92154</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$450.00</td>
                                            <td><span class="badge badge-pill badge-warning">Shipped</span></td>
                                            <td>UK</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
