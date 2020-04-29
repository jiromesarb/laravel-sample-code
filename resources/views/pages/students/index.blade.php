@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#simple_crud_tab" role="tab" aria-controls="simple_crud_tab"
                                aria-selected="true">Simple Crud</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#api_crud_tab" role="tab" aria-controls="api_crud_tab"
                                aria-selected="">API Crud</a>
                            </li>
                        </ul>
                        <div class="tab-content my-5">
                            <div id="simple_crud_tab" class="tab-pane active">
                                @include('pages.students.includes.index_simple_crud')
                            </div>
                            <div id="api_crud_tab" class="tab-pane">
                                sad
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
