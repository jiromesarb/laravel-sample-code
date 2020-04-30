@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Student Management</li>
                    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Simple CRUD</a></li>
                    <li class="breadcrumb-item">Show Student - {{ $student['name'] }}</li>
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
                            <h5 class="mb-0 card-title">Show Student - {{ $student['name'] }}</h5>
                            <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
                            <div class="clearfix"></div><br>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <a href="{{ route('student.edit', $student['id']) }}" class="btn btn-info"><span class="fa fa-pencil"></span></a>
                                <a href="{{ route('student.index') }}" class="btn btn-secondary"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Student Name</label><br>
                                <label>
                                    <strong>{{ $student['name'] }}</strong>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Contact Number</label><br>
                                <label>
                                    <strong>{{ $student['contact_number'] }}</strong>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Email Address</label><br>
                                <label>
                                    <strong>{{ $student['email'] }}</strong>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Address</label><br>
                                <label>
                                    <strong>{{ $student['address'] }}</strong>
                                </label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
