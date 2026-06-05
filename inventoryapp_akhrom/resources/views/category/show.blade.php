@extends('layouts.master')

@section('title')
Tampil Category
@endsection

@section('content')
<a href="/category/create" class="btn btn-sm btn-primary my-3">Tambah</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($category as $item)
         <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->name}}</td>
            <td>
                <form action="category/{{$item->id}}" method="POST">
                    <a href="/category/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/category/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>

                    @csrf
                    @method("DELETE")
                    <input type="submit" class="btn btn-sm btn-danger" value="Delete"/>
                
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td>Tidak ada Categori</td>
            </tr>
        @endforelse

        

    </tbody>
</table>
@endsection