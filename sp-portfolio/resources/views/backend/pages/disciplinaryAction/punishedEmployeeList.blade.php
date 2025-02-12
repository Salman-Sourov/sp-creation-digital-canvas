@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('show.punished.employee.list') }}" id="myForm" method="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group d-flex">
                            <div class="col-md-3">
                                <label for="designation">Select Disciplinary Action</label>
                            </div>
                            <div class="col-md-5">
                                <select name="disciplinaryAction" id="" class="form-control @if($errors->has('disciplinaryAction')) is-invalid @endif">
                                    <option value="" selected>Select Disciplinary Action</option>
                                        @foreach ($actions as $action)
                                            <option value="{{ $action->id  }}">{{ $action->action_name }}</option>
                                        @endforeach
                                </select>
                                @if($errors->has('disciplinaryAction'))
                                    <span class="error invalid-feedback">{!! $errors->first('disciplinaryAction') !!}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-md btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="card-body p-0 mt-2">
                <table class="table table-responsive-md table-responsive-lg table-responsive-sm text-center" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Department</th>
                            @include('backend.pages.commons.timestamps_th')
                            <th class="custom_actions">Actions</th>
                        </tr>
                    </thead>

                    @if($punishedEmplyoees)
                    <tbody>

                            @foreach ($punishedEmplyoees as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{  $row->getEmployee->name_english }}</td>
                                    {{-- @php
                                        $department = Department::find($row->getEmployee->department_id);
                                    @endphp --}}
                                    <td>{{ $row->getEmployee->getDepartment->name}}</td>
                                    @include('backend.pages.commons.timestamps_td')
                                    <td class="custom_actions">
                                        <div class="btn-group">
                                            {{-- <a href="" class="btn btn-flat btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <i class="far fa-eye"></i>
                                            </a> --}}
                                            <a href="#" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            {{-- <form method="post" class="list_delete_form" action="#" accept-charset="UTF-8" >
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-flat btn-outline-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                    </tbody>
                    @endif
                </table>
            </div>
        @if($actions)
            <div class="card-footer">

            </div>
        @endif
    </div>
</div>




</section>
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')

@endsection
