@extends('layouts.master')

@section('title')
    Tambah Transaction
@endsection

@section('content')
    <form action="/transaction" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Product</label>
            <select class="form-select" name="product_id">
                <option value="">--</option>
                @forelse ($product as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                @empty
                    <option value="">Data Kosong</option>
                @endforelse
            </select>

        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <select class="form-select" name="type">
                <option value="in">Masuk</option>
                <option value="out">Keluar</option>
            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="amount" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <input type="text" name="notes" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
