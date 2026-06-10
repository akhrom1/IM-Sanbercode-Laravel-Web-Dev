@extends('layouts.master')

@section('title')
    Edit Category
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/category/{{ $category->id }}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @method('PUT')

        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Category</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="40" rows="10">{{ $category->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
