@extends('backend')

@section('page_level_css_plugins')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link href="{{ asset('AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('page_level_css_files')

@endsection

@section('content')
<section class="content">
@if($errors->any())
<div class="card pl-3 bg-danger">
{!! implode('', $errors->all('<div>:message</div>')) !!}
</div>
@endif
<div class="card">
<div class="card-header">
<h1 class="card-title">{{ $commons['content_title'] }}</h1>

<div class="card-tools">
Note:: * marked fields are required
</div>
</div>
<form method="POST" action="{{ route('userinfo.store') }}" enctype="multipart/form-data">
            @csrf
<div class="card-body">


<div class="container-fluid card " style="overflow:hidden">
<div class="row">

    <div class="col-md-8">
            <div class="form-group @if ($errors->has('file')) has-error @endif">
                <label for="">Upload Attendence excel here *</label>
                <input type="file" name="file" class="form-control @if($errors->has('file')) is-invalid @endif" value="{{ old('file') }}" placeholder="Enter Service Image" id="image">
                @if($errors->has('service_image'))
                    <span class="error invalid-feedback">{{ $errors->first('service_image') }}</span>
                @else
                    <span class="help-block"> This field is required. </span>
                @endif
            </div>
    </div>

        
        <div class="col-md-4">

       
                
        </div>
        
</div>
    <button type="submit" class="btn btn-primary">Import</button>
        </form>
</div>



        
</div>


</div>
</div>
</div>

</form>
</div>

</section>

@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
<script src="{{ asset('AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')

@endsection
