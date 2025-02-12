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
                Note::
            </div>
        </div>
        <form action="{{ route('officeTime.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Office Start Time</label>
                            <input type="time" name="startTime" class="form-control @if($errors->has('startTime')) is-invalid @endif" placeholder="Enter Department Name">
                            @if($errors->has('startTime'))
                                <span class="error invalid-feedback">{!! $errors->first('startTime') !!}</span>
                            @else
                                <span class="help-block"style="color:maroon"> *This field is required. </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Office End Time</label>
                            <input type="time" name="endTime" class="form-control @if($errors->has('endTime')) is-invalid @endif"  placeholder="Enter Department Name">
                            @if($errors->has('endTime'))
                                <span class="error invalid-feedback">{!! $errors->first('endTime') !!}</span>
                            @else
                                <span class="help-block"style="color:maroon"> *This field is required. </span>
                            @endif
                        </div>
                    </div>
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Change Office Time</button>
            </div>
        </form>
    </div>




    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                Note::Office Time
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-responsive-md table-responsive-lg table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        @include('backend.pages.commons.timestamps_th')
                    </tr>
                </thead>
                <tbody>
                    @foreach ($times as $row)
                        <tr>
                            @php
                                $time = new DateTime($row->startTime, new DateTimeZone('GMT+6'));
                                $startTime = $time->format("h:i:s A");
                                $time = new DateTime($row->endTime, new DateTimeZone('GMT+6'));
                                $endTime = $time->format("h:i:s A");
                            @endphp
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $startTime }}</td>
                            <td>{{ $endTime }}</td>
                            @include('backend.pages.commons.timestamps_td')
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
