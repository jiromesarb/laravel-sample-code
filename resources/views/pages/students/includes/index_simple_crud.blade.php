

<div class="row">
    <div class="col-md-6">
        <h5 class="mb-0 card-title">Student Management</h5>
        <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
        <div class="clearfix"></div><br>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            <a href="{{ route('student.create') }}" class="btn btn-success"><span class="fa fa-plus"></span></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('includes.notif')
        <table class="table">
            <thead>
                <th>Student</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Address</th>
                <th class="text-center" width="20%">Action</th>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['contact_number'] }}</td>
                    <td>{!! !empty($student['email']) ? $student['email'] : '<span class="text-danger">N/A</span>' !!}</td>
                    <td>{!! !empty($student['address']) ? $student['address'] : '<span class="text-danger">N/A</span>' !!}</td>
                    <td class="text-center">
                        <form action="{{ route('student.destroy', $student['id']) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <a href="{{ route('student.show', $student['id']) }}" class="btn btn-md btn-info"><span class="fa fa-eye"></span></a>
                            <button class="btn btn-md btn-danger"><span class="fa fa-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="float-right">
            {{ $students->appends(request()->input())->links() }}
        </div>
    </div>
</div>
