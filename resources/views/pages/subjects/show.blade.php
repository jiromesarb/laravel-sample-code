@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subject Management</a></li>
                    <li class="breadcrumb-item">Show Subject - {{ $subject['name'] }}</li>
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
                            <h5 class="mb-0 card-title">Show Subject - {{ $subject['name'] }}</h5>
                            <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
                            <div class="clearfix"></div><br>
                        </div>
                        <div class="col-md-6 col-5">
                            <div class="float-right">
                                <a href="{{ route('subject.edit', $subject['id']) }}" class="btn btn-info"><span class="fa fa-pencil"></span></a>
                                <a href="{{ route('subject.index') }}" class="btn btn-secondary"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Subject</label><br>
                                <label>
                                    <strong>{{ $subject['name'] }}</strong>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Address</label><br>
                                <label>
                                    <strong>{!! !empty($subject['description']) ? $subject['description'] : '<span class="text-danger">N/A</span>' !!}</strong>
                                </label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
