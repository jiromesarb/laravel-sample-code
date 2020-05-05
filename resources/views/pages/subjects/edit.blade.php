@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subject Management</a></li>
                    <li class="breadcrumb-item">Edit Subject - {{ $subject['name'] }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-0 card-title">Update Subject - {{ $subject['name'] }}</h5>
                            <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
                            <div class="clearfix"></div><br>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <a href="{{ route('subject.index') }}" class="btn btn-secondary"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                    </div>

                    @include('includes.notif')
                    <div class="row">

                        <div class="col-md-4">
                            <form action="{{ route('subject.update', $subject['id']) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}


                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="name" class="form-control" value="{{ !empty(old('name')) ? old('name') : $subject['name'] }}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" value="{{ !empty(old('description')) ? old('description') : $subject['description'] }}">
                                </div>

                                <div class="form-form">
                                    <a href="{{ route('subject.show', $subject['id']) }}" class="text-light btn btn-md btn-secondary">Cancel</a>
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
