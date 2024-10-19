@extends('layouts.template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Mengubah dari col-md-8 ke col-md-12 untuk tampilan lebih besar -->
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white py-4">
                    <h4 class="mb-0">Profile Update</h4>
                </div>
                <div class="card-body">

                    @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Bagian Profile Picture, Nama, dan Role -->
                    <div class="text-center">
                        @if($user->avatar)
                            <img src="{{ asset('storage/photos/'.$user->avatar) }}" class="img-fluid rounded-circle shadow" style="width: 250px; height: 250px;">
                        @else
                            <img src="{{ asset('/public/img/pp.png') }}" class="img-fluid rounded-circle shadow" style="width: 100px; height: 100px;">
                        @endif
                        <h5>{{ $user->nama }}</h5>
                        <p class="text-muted">{{ $user->username }}</p>
                    </div>

                    <!-- Bagian Form Update Profile -->
                    <form method="POST" action="{{ route('profile.update', $user->user_id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control shadow-sm @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" placeholder="Enter your username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <div class="col-md-8">
                                <input id="nama" type="text" class="form-control shadow-sm @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $user->nama) }}" required autocomplete="nama" placeholder="Enter your full name">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="old_password" class="col-md-4 col-form-label text-md-end">{{ __('Password Lama') }}</label>
                            <div class="col-md-8">
                                <input id="old_password" type="password" class="form-control shadow-sm @error('old_password') is-invalid @enderror" name="old_password" autocomplete="old-password" placeholder="Enter your old password">
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password Baru') }}</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control shadow-sm @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Enter new password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control shadow-sm" name="password_confirmation" autocomplete="new-password" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Ganti Foto Profil') }}</label>
                            <div class="col-md-8">
                                <input id="avatar" type="file" class="form-control shadow-sm" name="avatar">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary shadow-sm px-4">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
