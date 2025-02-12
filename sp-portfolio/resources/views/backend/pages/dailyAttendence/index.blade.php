@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ $commons['content_title'] }}</h1>

            <div class="card-tools">
                Note::Give All Employee Daily Attendance
            </div>
        </div>
        <form action="{{ route('dailyAttendance.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Attendance Date</label>
                            <input type="date" name="attendance_date" class="form-control @if($errors->has('attendance_date')) is-invalid @endif" placeholder="Enter Department Name">
                            @if($errors->has('attendance_date'))
                                <span class="error invalid-feedback">{!! $errors->first('attendance_date') !!}</span>
                            @else
                                <span class="help-block"style="color:maroon"> *</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">In Time</label>
                            <input type="time" name="inTime" class="form-control @if($errors->has('inTime')) is-invalid @endif"  placeholder="Enter Department Name">
                            @if($errors->has('inTime'))
                                <span class="error invalid-feedback">{!! $errors->first('inTime') !!}</span>
                            @else
                                <span class="help-block"style="color:maroon"> *</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Out Time</label>
                            <input type="time" name="outTime" class="form-control @if($errors->has('outTime')) is-invalid @endif"  placeholder="Enter Department Name">
                            @if($errors->has('outTime'))
                                <span class="error invalid-feedback">{!! $errors->first('outTime') !!}</span>
                            @else
                                <span class="help-block"style="color:maroon">*</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
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
