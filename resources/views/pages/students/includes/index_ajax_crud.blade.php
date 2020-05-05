<div class="row">
    <div class="col-md-6">
        <h5 class="mb-0 card-title">Student Management (AJAX CRUD)</h5>
        <hr class="my-1" style="border-top: 3px solid #8c8b8b;" width="40px" align="left">
        <div class="clearfix"></div><br>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            <button type="button" data-toggle="modal" data-target="#ajax-filter-student" class="btn btn-info text-light" ><span class="fa fa-search"></span></button>
            <button type="button" data-toggle="modal" data-target="#add-student" class="btn btn-success"><span class="fa fa-plus"></span></butotn>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('includes.notif')
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Student</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th class="text-center">Subjects</th>
                    <th class="text-center" width="20%">Action</th>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student['name'] }}</td>
                            <td>{{ $student['contact_number'] }}</td>
                            <td>{!! !empty($student['email']) ? $student['email'] : '<span class="text-danger">N/A</span>' !!}</td>
                            <td>{!! !empty($student['address']) ? $student['address'] : '<span class="text-danger">N/A</span>' !!}</td>
                            <td class="text-center">{{ !empty($student['getSubjects']) ? count($student['getSubjects']) : 0 }}</td>
                            <td class="text-center">
                                <form action="{{ route('student.destroy', $student['id']) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a href="{{ route('student.show', $student['id']) }}" class="btn btn-md btn-info text-light"><span class="fa fa-eye"></span></a>
                                    <button class="btn btn-md btn-danger"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="float-right">
            {{ $students->appends(request()->input())->links() }}
        </div>
    </div>
</div>

<div class="modal" id="add-student" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('student.index') }}" method="get">
                <div class="modal-body">
                    <form action="{{ route('student.store') }}" method="POST">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
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
                                    @endif
                                    >{{ $subject['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="text-light btn btn-md btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="ajax-filter-student" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('student.index') }}" method="get">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Keyword</label>
                                <input type="text" name="keyword" class="form-control" value="{{ request()->keyword }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Subjects</label>
                                <select name="subjects[]" class="form-control select2-multiple-tags-strict" multiple>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject['id'] }}"
                                        @if(!empty(request()->subjects))
                                            {{ in_array($subject['id'], request()->subjects) ? 'selected' : '' }}
                                        @endif
                                        >{{ $subject['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="clear_filter">Clear filter <span class="fa fa-times"></span></button>
                    <button class="btn btn-primary">Search <span class="fa fa-search"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Call this function to clear all filter fields
    $('#clear_filter').click(() => {
        $('input').val('');
        $('select').val(null).trigger("change");
    });


</script>
