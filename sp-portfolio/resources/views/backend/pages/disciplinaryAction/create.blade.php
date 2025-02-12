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
            <form action="{{ route('disciplinary.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add New Disciplinary Action</label>
                        <input type="text" name="action_name" class="form-control @if($errors->has('action_name')) is-invalid @endif" value="{!! old('action_name') !!}" placeholder="Enter Disciplinary Action Name">
                        @if($errors->has('action_name'))
                            <span class="error invalid-feedback">{!! $errors->first('action_name') !!}</span>
                        @else
                            <span class="help-block"style="color:maroon"> *This field is required. </span>
                        @endif
                    </div>

                    {{-- <div class="form-group  @if ($errors->has('department_belongs_to')) has-error @endif">
                        <label class="control-label">Select Office </label>
                        <select name="department_belongs_to" id="department_belongs_to" class="form-control select2 @if($errors->has('department_belongs_to')) is-invalid @endif" value="{!! old('department_name') !!}">
                            @foreach($offices as $office)
                                <option value="{!! $office->id !!}" @if(old('type') == $office->id) {!! 'selected' !!} @endif>{!! $office->name !!}</option>
                            @endforeach
                        </select>

                        @if($errors->has('department_belongs_to'))
                            <span class="error invalid-feedback"> {!! $errors->first('department_belongs_to') !!} </span>
                        @else
                            <span class="help-block" style="color:maroon">*Select office first ! </span>
                        @endif
                    </div> --}}
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </section>

    @include('backend.pages.disciplinaryAction._table')
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    <script>


    </script>
@endsection
