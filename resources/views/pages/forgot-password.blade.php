@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Forgot Password?') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login.post-forgot-password') }}">
                            @csrf
                            @include('includes.notif')

                            <div class="form-group row">
                                <label for="employee_number" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="employee_number" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>

                                    {{-- @if (Route::has('password.request')) --}}
                                        {{-- <a class="btn btn-link" href="{{ route('login.forgot-password') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a> --}}
                                    {{-- @endif --}}

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
