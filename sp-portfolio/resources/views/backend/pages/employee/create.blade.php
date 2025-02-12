@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')
@livewireStyles
@endsection

@section('content')
    <section class="content">
        @livewire('multistep-employee')
    </section>
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
@livewireScripts
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')




@endsection
