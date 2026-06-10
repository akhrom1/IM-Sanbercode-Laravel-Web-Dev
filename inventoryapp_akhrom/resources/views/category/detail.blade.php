@extends('layouts.master')

@section('title')
    Detail Category
@endsection

@section('content')
    <h1 class="text-primary">{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category->products as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <form action="products/{{ $item->id }}" method="POST">
                            <a href="/products/{{ $item->id }}" class="btn btn-sm btn-info">Detail</a>
                            {{-- <a href="/products/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a> --}}

                            {{-- @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete" /> --}}

                        </form>
                    </td>
                </tr>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        Tidak ada Product
                    </div>
                </div>
            @endforelse

        </tbody>
    </table>
    <a href="/category" class="btn btn-secondary btn-sm ">Kembali</a>
@endsection
