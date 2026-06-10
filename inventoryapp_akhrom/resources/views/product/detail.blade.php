@extends('layouts.master')

@section('title')
    Detail Product
@endsection

@section('content')
    <div class="card border-0 shadow-sm">

        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded-top"
            style="width:100%; height:450px; object-fit:cover;">

        <div class="card-body p-4">

            <h1 class="fw-bold text-primary">
                {{ $product->name }}
            </h1>

            <h3 class="text-success fw-bold mb-3">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </h3>

            <div class="mb-3">
                <span class="badge bg-success">
                    Stock: {{ $product->stock }}
                </span>
            </div>

            <hr>

            <h5>Deskripsi Produk</h5>
            <p class="text-muted">
                {{ $product->description }}
            </p>

        </div>

    </div>
@endsection
