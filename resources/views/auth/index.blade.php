@extends('layouts.master')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session ('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container">
                    <main class="form-login">
                        <form action="/login" method="POST">
                            @csrf
                            <h1 class="h3 mb-3 fw-normal">Login</h1>
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control mt-2" id="username" placeholder="username" autofocus>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control mt-2" id="password" placeholder="password">
                                <label for="password">Password</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit" >Login</button>
                        </form>
                        <small class="d-block text-center mt-3">Belum punya akun? <a href="/register">Register</a></small>
                    </main>
                </div>
            </div>
        </div>
@endsection
