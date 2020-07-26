@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset your password') }}</div>
                    {{-- {{ dd($token) }} --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('post-reset-password', $token) }}">
                            @csrf
                            @include('includes.notif')

                            @if (!empty(session()->get('validation_errors')))
                                <div class="alert alert-danger">
                                    {{-- {{ dd() }} --}}
                                    @foreach (session()->get('validation_errors') as $error)
                                    <span class='fa fa-times-circle'></span> {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 control-label">New Password</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
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
