

@extends('layouts.app')

@section('main')
<div class="mx-auto" style="width: 380px; margin-top:9rem">

    <div class="card">
        <div class="card-body">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input name="email" value="{{ old ('email') }}" class="form-control" id="" rows="1"></input>
                    @error('email')
                    <span class="text-warning">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input name="password" type="password" value="{{ old ('password') }}" class="form-control" id="" rows="1"></input>
                    @error ('password')
                    <span class="text-warning">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection



