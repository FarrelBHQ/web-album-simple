@extends('layouts.app')

@section('main')
<div class="mt-5 mx-auto" style="width: 380px">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('galeries.update', $editGalery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input name="image" type="file" class="form-control" id="" rows="1"></input>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input name="name" value="{{old('name', $editGalery->name)}}" type="text" class="form-control">
                    @error('name')
                    <span class="text-warning">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <input name="description" value="{{old('description', $editGalery->description)}}" type="text" class="form-control">
                    @error('description')
                    <span class="text-warning">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection