@extends('layouts.master')

@section('title')
    Product
@endsection

@section('content')
    @if (Auth::check() && Auth::user()->role == 'admin')
        <a href="/products/create" class="btn btn-primary mb-4">Tambah Product</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($product as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}"
                        style="height: 250px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($item->name, 100) }}</h5>

                        <span class="badge bg-info text-white">{{ $item->category->name }}</span>

                        <p class="card-text text-muted">
                            {{ Str::limit($item->description, 100) }}
                        </p>

                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>Price:</strong>
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Stock:</strong>
                                {{ $item->stock }}
                            </li>
                        </ul>
                    </div>

                    <div class="card-footer bg-white">
                        <form action="/products/{{ $item->id }}" method="POST">
                            <a href="/products/{{ $item->id }}" class="btn btn-info btn-sm">
                                Detail
                            </a>

                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <a href="/products/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Delete
                                </button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Tidak ada Product
                </div>
            </div>
        @endforelse
    </div>
@endsection
