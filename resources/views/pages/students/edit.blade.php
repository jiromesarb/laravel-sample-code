@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student Management</a></li>
                    <li class="breadcrumb-item">Edit Student - {{ $student['name'] }}</li>
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
                            <h5 class="mb-0 card-title">Update Student - {{ $student['name'] }}</h5>
                            <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
                            <div class="clearfix"></div><br>
                        </div>
                        <div class="col-md-6 col-5">
                            <div class="float-right">
                                <a href="{{ route('student.index') }}" class="btn btn-secondary"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                    </div>

                    @include('includes.notif')
                    <div class="row">

                        <div class="col-md-4">
                            <form action="{{ route('student.update', $student['id']) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}


                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ !empty(old('name')) ? old('name') : $student['name'] }}">
                                </div>

                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_number" class="form-control" value="{{ !empty(old('contact_number')) ? old('contact_number') : $student['contact_number'] }}">
                                </div>

                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ !empty(old('email')) ? old('email') : $student['email'] }}">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ !empty(old('address')) ? old('address') : $student['address'] }}">
                                </div>

                                <div class="form-group">
                                    <label>Subjects</label>
                                    <select name="subjects[]" id="" class="form-control select2-multiple-tags-strict" multiple>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject['id'] }}"
                                            @if(!empty(old('subjects')))
                                                @if(in_array($subject['id'], old('subjects')))
                                                    selected
                                                @endif
                                            @else
                                                @if(!empty($student->getSubjects))
                                                    @if(in_array($subject['id'], (array)$student->getSubjects->pluck('subject_id')->toArray()))
                                                        selected
                                                    @endif
                                                @endif
                                            @endif
                                            >{{ $subject['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-form">
                                    <a href="{{ route('student.show', $student['id']) }}" class="text-light btn btn-lg btn-secondary">Cancel</a>
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
