@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('discipline.employee.list') }}" id="myForm" method="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group d-flex">
                            <div class="col-md-3">
                                <label for="designation">Select Department</label>
                            </div>
                            <div class="col-md-5">
                                <select name="department" id="" class="form-control @if($errors->has('department')) is-invalid @endif">
                                    <option value="" selected>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id  }}">{{ $department->name }}</option>
                                        @endforeach
                                </select>
                                @if($errors->has('department'))
                                    <span class="error invalid-feedback">{!! $errors->first('department') !!}</span>
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
                            <th>Email</th>

                            @include('backend.pages.commons.timestamps_th')

                            <th class="custom_actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if($employees)
                                @foreach($employees as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $row->name_english }}</td>
                                        <td>{{ $row->email  }}</td>

                                        @include('backend.pages.commons.timestamps_td')

                                        <td class="custom_actions">
                                            <div class="btn-group">
                                                {{-- <a href="" class="btn btn-flat btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <i class="far fa-eye"></i>
                                                </a> --}}
                                                <a href="" class="btn btn-flat btn-outline-info btn-sm" data-toggle="modal" data-target="#action_{{ $row->id }}"  title="Take Action">
                                                    <i class="fas fa-question-circle"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Take Action Modal --}}
                                    <div class="modal fade" id="action_{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" style="text-align: center;">Take Disciplinary Action</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('take.disciplinary.action') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="employee_id" value={{ $row->id }}>
                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Actions:</label>
                                                  <select class="form-control @if($errors->has('disciplinary_action')) is-invalid @endif" name="disciplinary_action" required>
                                                        <option value="">Select Action</option>
                                                        @foreach ($disciplinary_actions as $action)
                                                            <option value="{{ $action->id }}">{{ $action->action_name }}</option>
                                                        @endforeach
                                                  </select>
                                                  @if($errors->has('disciplinary_action'))
                                                        <span class="error invalid-feedback">{!! $errors->first('disciplinary_action') !!}</span>
                                                  @endif
                                                </div>
                                                <div class="form-group">
                                                  <label for="message-text" class="col-form-label">Punishment Start Date:</label>
                                                  <input type="date" name="punishment_start_date" class="form-control" id="punishment_start_date" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Punishment End Date:</label>
                                                    <input type="date" name="punishment_end_date" class="form-control" id="punishment_end_date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Reason</label>
                                                    <textarea name="action_reason" class="form-control" id="" cols="5" rows="2"></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                          </div>
                                        </div>
                                      </div>
                                      {{-- End Take Action Modal --}}
                                @endforeach
                            @endif
                        </tbody>
                </table>
            </div>
        @if($employees)
            <div class="card-footer">
                {{ $employees->withQueryString()->links('pagination::bootstrap-5') }}
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
