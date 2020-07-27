@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subject Management</a></li>
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
                            <h5 class="mb-0 card-title">Subject Management</h5>
                            <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
                            <div class="clearfix"></div><br>
                        </div>
                        <div class="col-md-6 col-5">
                            <div class="float-right">
                                <a href="{{ route('subject.create') }}" class="btn btn-success"><span class="fa fa-plus"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @include('includes.notif')
                            <table class="table">
                                <thead>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th class="text-center" width="20%">Action</th>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject['name'] }}</td>
                                        <td>{!! !empty($subject['description']) ? $subject['description'] : '<span class="text-danger">N/A</span>' !!}</td>
                                        <td class="text-center">
                                            <form action="{{ route('subject.destroy', $subject['id']) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <a href="{{ route('subject.show', $subject['id']) }}" class="btn btn-md btn-info text-light"><span class="fa fa-eye"></span></a>
                                                <button class="btn btn-md btn-danger"><span class="fa fa-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $subjects->appends(request()->input())->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
