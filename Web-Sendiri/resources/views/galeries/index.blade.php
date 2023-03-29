@extends('layouts.app')

@section('main')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Album example · Bootstrapp</title>

    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .card {
            display: flex;
            flex-direction: column;
            margin: 10px;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>

<body>



    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="font-weight-light">Simple Album.</h1>
                    <p class="lead text-muted">Share your digital photo album with the world in a <strong>Simple</strong> &amp; <strong>Easy</strong> way.</p>
                    <p>
                        <a href="{{ route('galeries.create') }}" class="btn btn-primary my-2">Add to Album</a>
                        <a class="btn btn-secondary my-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout_form').submit();">Log
                            Out</a>
                    <form action="{{ route('logout') }}" id="logout_form" method="POST">
                        @csrf
                    </form>
                    </p>
                </div>
            </div>
        </section>
        
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($image as $img)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ url('/storage', $img->image) }}" alt="gambar" class="bd-placeholder-img card-img-top" width="100%" height="225"  aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" role="image" focusable="false">
                            <div class="card-body">
                                <p class="card-text">{{ $img->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="{{route('galeries.delete', $img->id)}}" method="POST">
                                            @csrf @method('DELETE')
                                            <a href="{{ route ('galeries.edit', $img->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
                                        </form>
                                    </div>
                                    <small class="text-muted">{{$img->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </main>

</body>

</html>

@endsection