@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User Management</a></li>
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
                            <h5 class="mb-0 card-title">User Management</h5>
                            <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
                            <div class="clearfix"></div><br>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <a href="{{ route('user.create') }}" class="btn btn-success"><span class="fa fa-plus"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @include('includes.notif')
                            <table class="table datatable">
                                <thead>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th class="text-center" width="20%">Action</th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{!! $user['email'] !!}</td>
                                        <td class="text-center">
                                            <form action="{{ route('user.destroy', $user['id']) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <a href="{{ route('user.show', $user['id']) }}" class="btn btn-md btn-info text-light"><span class="fa fa-eye"></span></a>
                                                <button class="btn btn-md btn-danger"><span class="fa fa-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="float-right">
                                {{-- {{ $users->appends(request()->input())->links() }} --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
