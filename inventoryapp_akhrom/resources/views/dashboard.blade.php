@extends('layouts.master')

@section('title')
    Halaman Utama
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card shadow border-0">
            <div class="card-body p-4">

                <h2 class="fw-bold text-primary mb-3">
                    Selamat Datang, {{ Auth::user()->name }}
                </h2>

                <hr>

                @if (!empty($user->age) || !empty($user->bio))
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h6 class="text-secondary">Age</h6>
                                    <h4>{{ $user->age ?? '-' }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h6 class="text-secondary">Bio</h6>
                                    <p class="mb-0">
                                        {{ $user->bio ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <strong>Profil belum lengkap!</strong><br>
                        Silahkan isi di menu profile
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
