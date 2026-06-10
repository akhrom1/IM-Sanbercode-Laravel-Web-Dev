@extends('layouts.master')

@section('title')
    Tampil Transaction
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="/transaction/create" class="btn btn-sm btn-primary my-3">Tambah</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Product</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                {{-- <th scope="col">notes</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($transaction as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ Str::limit($item->product->name, 150) }}</td>
                    <td>
                        @if ($item->type == 'in')
                            <span class="badge bg-primary">IN</span>
                        @elseif ($item->type == 'out')
                            <span class="badge bg-danger">OUT</span>
                        @endif
                    </td>
                    <td>{{ $item->amount }}</td>
                    {{-- <td>{{ $item->notes }}</td> --}}
                    <td>
                        {{-- <form action="category/{{ $item->id }}" method="POST">
                            <a href="/category/{{ $item->id }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="/category/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete" />

                        </form> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Tidak ada Trasaction</td>
                </tr>
            @endforelse



        </tbody>
    </table>
@endsection
