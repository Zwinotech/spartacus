@extends('theme.auth')

@section('title')
    Login
@endsection

@section('content')

    <div class="col-12">
        <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded10 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <h2 class="text-primary">Get started with Us</h2>
                        <p class="mb-0">Join Skills Panda</p>
                    </div>
                    <div class="p-40">
                        <form action="{{ route('register') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    <input type="text" class="form-control ps-15 bg-transparent" name="firstname" value="{{ old('firstname') }}" placeholder="Name">
                                    @if ($errors->has('firstname'))
                                        <span class="text-danger text-left">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    <input type="text" class="form-control ps-15 bg-transparent" name="lastname" value="{{ old('lastname') }}" placeholder="Surname">
                                    @if ($errors->has('lastname'))
                                        <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                    <input type="email" class="form-control ps-15 bg-transparent" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                    <input type="text" class="form-control ps-15 bg-transparent" name="username" value="{{ old('username') }}" placeholder="Username">
                                    @if ($errors->has('username'))
                                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                    <input type="password" class="form-control ps-15 bg-transparent" name="password" value="{{ old('password') }}" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                    <input type="password" class="form-control ps-15 bg-transparent" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Retype Password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="checkbox">
                                        <input type="checkbox" id="basic_checkbox_1" >
                                        <label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info margin-top-10">SIGN IN</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="mt-15 mb-0">Already have an account?<a href="auth_login.html" class="text-danger ms-5"> Sign In</a></p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <p class="mt-20 text-white">- Register With -</p>
                    <p class="gap-items-2 mb-20">
                        <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection