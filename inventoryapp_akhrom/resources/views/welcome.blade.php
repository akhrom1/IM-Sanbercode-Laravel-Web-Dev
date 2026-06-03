@extends('layouts.master')

@section('title')
Selamat Datang
@endsection

@section('content')

<h1>Selamat Datang {{$first}} {{$last}}</h1>

<p>Gender: {{ $gender }}</p>
<p>Nationality: {{ $nationality }}</p>
<p>Language: {{ implode(', ', $language) }}</p>
<p>Bio: {{ $bio }}</p>
<h2>
    Terima kasih telah bergabung di Sanberbook. Social Media kita bersama!
</h2>

@endsection