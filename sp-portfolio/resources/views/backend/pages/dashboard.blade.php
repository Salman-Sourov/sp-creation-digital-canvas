@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')



        <section class="content">
            <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="card bg-success">
                        <div class="card-header">
                            @auth
                                <h3>Hi {{ Auth::user()->name_english }}</h3>
                            @endauth
                            @php
                                date_default_timezone_set('Asia/Dhaka');
                                $time = time();
                                $t = date("H:i:s",$time);
                                if($t>"12:00:00")
                                {
                            @endphp
                                    <h6>Good Afternoon</h6>
                            @php
                                }
                                else if($t<="12:00:00")
                                {
                            @endphp
                                    <h6>Good Morning</h6>
                            @php
                                }
                            @endphp

                            @php
                                $clockIn = App\Models\AttendenceLog::where('attendance_date',date('Y-m-d'))->where('employee_id',Auth::user()->id)->first();
                                // var_dump($clockIn);
                                $clockOut = App\Models\AttendenceLog::where('attendance_date',date('Y-m-d'))->where('employee_id',Auth::user()->id)->WhereNotNull('inTime')->WhereNotNull('outTime')->first();
                            @endphp
                            {{-- dd($clockIn); --}}
                            @if($clockIn == '')
                            <form action="{{ route('clockIn.dashboard') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-primary text-right mb-2"  title="Give Your Attendance">Clock In</button>
                                <h5>You are not clocked in yet!</h5>
                            </form>
                            @endif
                            @if($clockIn != '' && $clockOut == '')
                            <form action="{{ route('clockOut.dashboard') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-primary text-right mb-3"  title="Give Your Attendance">Clock Out</button>
                                <h5>You are not clocked out yet!</h5>
                            </form>
                            @endif
                            @if($clockOut != '')
                                <h4>Your Total Attendance Is Done</h4>
                            @endif

                        </div>
                        <div class="card-body">
                            <h1 id="time"></h1>
                        </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <!-- ./col -->

            </div>

            <div class="row">

                <!-- ./col -->
                <div class="col-lg-6 col-6">
                <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h3></h3>

                        <p class="text-center">Total Working Days</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <!-- ./col -->

                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3></h3>


                            <p class="text-center">Absent This Month</p>
                        </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
            </div>


            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>

        {{-- modal for employee attendance form  --}}
        <div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" style="text-align: center;">Take Disciplinary Action</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="employee_id">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Actions:</label>
                      <select class="form-control @if($errors->has('disciplinary_action')) is-invalid @endif" name="disciplinary_action" required>
                            <option value="">Select Action</option>

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



        <section class="content">

        </section>



        <section class="content">

        </section>



@endsection

<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

{{-- <script src="{{ asset('AdminLTE-3.2.0/plugins/chart.js/Chart.min.js') }}"></script> --}}

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
<script>
    function updateTime()
        {
            const d = new Date();
            const time = d.toLocaleTimeString();
            document.getElementById("time").innerHTML = time;

        }
    updateTime();
    setInterval(updateTime, 1000);
</script>

@endsection
