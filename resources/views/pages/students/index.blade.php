@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student Management</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#simple_crud_tab" role="tab" data-toggle="tab">Simple CRUD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#api_crud_tab" role="tab" data-toggle="tab">AJAX CRUD</a>
                        </li>
                    </ul>
                    <div class="tab-content my-5">
                        <div role="tabpanel" class="tab-pane active" id="simple_crud_tab">
                            @include('pages.students.includes.index_simple_crud')
                        </div>
                        <div role="tabpanel" class="tab-pane" id="api_crud_tab">
                            @include('pages.students.includes.index_ajax_crud')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
