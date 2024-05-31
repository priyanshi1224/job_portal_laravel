@extends('front.layouts.app');

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action={{ route('account.registerUser') }} method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="username" id="name"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Enter Name">
                            <span class="text-danger">
                                @error('username')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="useremail" id="email"
                                class="form-control @error('useremail') is-invalid @enderror" placeholder="Enter Email">
                            <span class="text-danger">
                                @error('useremail')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="name"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter Password">
                            <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" name="cpassword" id="name"
                                class="form-control @error('cpassword') is-invalid @enderror"
                                placeholder="Enter Password">
                            <span class="text-danger">
                                @error('cpassword')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a href="{{ route('account.loginPage') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection