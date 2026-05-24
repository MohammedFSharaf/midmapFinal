@extends('layouts.dash_master')
@section('title')
<title>{{ __('Profile') }}</title>
@endsection
@include('layouts.admin_sidebar')   {{-- ← أضف هاد السطر --}}

@section('dash-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Profile') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">

                {{-- Update Profile Info --}}
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Profile Information') }}</h4>
                        </div>
                        <div class="card-body">
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}" required autofocus />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}" required />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    @if (session('status') === 'profile-updated')
                                        <span class="text-success ml-3">{{ __('Saved.') }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Update Password --}}
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Update Password') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="current_password">{{ __('Current Password') }}</label>
                                    <input id="current_password" name="current_password" type="password"
                                        class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                        autocomplete="current-password" />
                                    @error('current_password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <input id="password" name="password" type="password"
                                        class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                        autocomplete="new-password" />
                                    @error('password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                                        autocomplete="new-password" />
                                    @error('password_confirmation', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    @if (session('status') === 'password-updated')
                                        <span class="text-success ml-3">{{ __('Saved.') }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection