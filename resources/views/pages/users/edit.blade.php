@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User Management</a></li>
                    <li class="breadcrumb-item">Edit User - {{ $user['name'] }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 col-7">
                            <h5 class="mb-0 card-title">Update User - {{ $user['name'] }}</h5>
                            <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
                            <div class="clearfix"></div><br>
                        </div>
                        <div class="col-md-6 col-5">
                            <div class="float-right">
                                <a href="{{ route('user.index') }}" class="btn btn-secondary"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                    </div>

                    @include('includes.api-notifs')
                    <div class="row">

                        <div class="col-md-4">
                            <form action="{{ route('user.update', $user['id']) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ !empty(old('name')) ? old('name') : $user['name'] }}">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ !empty(old('email')) ? old('email') : $user['email'] }}">
                                </div>

                                <div class="form-form">
                                    <a href="{{ route('user.show', $user['id']) }}" class="text-light btn btn-md btn-secondary">Cancel</a>
                                    <button class="text-light btn btn-md btn-success">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
