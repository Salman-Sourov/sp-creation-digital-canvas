@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('employee.list') }}" id="myForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group d-flex">
                                <div class="col-md-3">
                                    <label for="designation">Select Designation</label>
                                </div>
                                <div class="col-md-5">
                                    <select name="designation" id="" class="form-control @if($errors->has('designation')) is-invalid @endif">
                                        <option value="" selected>Select Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{$designation->id  }}">{{ $designation->name }}</option>
                                            @endforeach
                                    </select>
                                    @if($errors->has('designation'))
                                        <span class="error invalid-feedback">{!! $errors->first('designation') !!}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="card-body p-0 mt-2">
                    <table class="table table-responsive-md table-responsive-lg table-responsive-sm text-center" id="example1">

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


<script type="text/javascript">
    $(document).ready(function() {

        $('#myForm').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                $('#example1').empty();

                // console.log(response);

                var headerRow = '<thead>';
                headerRow += '<tr>';
                headerRow += '<th>#</th>';
                headerRow += '<th>Name</th>';
                headerRow += '<th>Email</th>';
                headerRow += '<th>Department</th>';
                headerRow += '<th>Status</th>';
                headerRow += '<th>Timestamp</th>';
                headerRow += '</tr>';

                // Include the Blade template using a placeholder
                headerRow += '<tr>';


                headerRow += '</td>';
                headerRow += '</tr>';

                headerRow += '</thead>';
                $('#example1').append(headerRow);

                $.each(response, function(index, item) {

                console.log(item);

                var row = '<tbody>';
                row += '<tr>';
                row += '<td>' + ++index + '</td>';
                row += '<td>' + item.name_english + '</td>';
                row += '<td>' + item.email + '</td>';
                row += '<td>' + item.name + '</td>';
                row += '<td>';

                // Conditionally display a badge based on $data->status
                if (item.status == 1) {
                    row += '<span class="right badge badge-success">Active</span>';
                } else {
                    row += '<span class="right badge badge-danger">Inactive</span>';
                } + '</td>';

                row += '<td>' + '<button type="button" class="btn btn-flat btn-sm btn-outline-primary custom_btn" data-toggle="collapse" href="#timestamps' + index + 'details" role="button" aria-expanded="false" aria-controls="trainee' + index + 'details">';
                row += '<i class="fa fas fa-clock pr-2" aria-hidden="true"></i>User';
                row += '</button>';
                row += '<div class="collapse" id="timestamps' + index + 'details">';
                row += '<div class="card card-body timestamps_collapse_body">';
                row += '<span>Created At: ' + moment(item.created_at).fromNow() + '</span>'; // Using Moment.js for date formatting
                //  console.log(item.created_at)
                row += '<span>Created By: ' + (item.created_by && item.created_by.name_english ? item.created_by.name_english : 'NA') + '</span>';



                row += '<span>Updated At: ' + (item.updated_at ? moment(item.updated_at).fromNow() : 'NA') + '</span>';
                row += '<span>Updated By: ' + (item.updatedBy ? item.updatedBy.name : 'NA') + '</span>';
                row += '</div>';
                row += '</div>';
                row += '</td>';

                row += '</tr>';
                row += '</tbody>';
                $('#example1').append(row);
                });
            },
            error: function(xhr) {
                // Error handling
            }
            });

        });
    });

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection
