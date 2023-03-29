@extends('layouts.app')

@section('main')

<section class="py-5 text-center container mt-3">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="font-weight-light">Welcome to A Simple Album.</h1>
            <br>
            <a href="{{ route ('login') }}" class="btn btn-dark my-2">Login</a>
            <a href="{{ route ('register') }}" class="btn btn-secondary my-2">Sign Up</a>
            </p>
        </div>
    </div>
</section>
@endsection