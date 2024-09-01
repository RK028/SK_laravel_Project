@extends('layout.masterout')

@section('title')
    Login
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                
                        <div class="app-brand justify-content-center">
                           
                            <a  class="app-brand-link gap-2">
                               
                                <span class="app-brand-logo demo">
                                    <center>
                                       
                                  </center>
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Login</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <form id="formAuthentication" class="mb-3" action="{{ url('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email " value="{{old('email')}}"autofocus />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="auth-forgot-password-basic.html">
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>
                        <p class="text-center">Don't have an account? <a href="{{ url('/') }}">Register</a></p>


                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
