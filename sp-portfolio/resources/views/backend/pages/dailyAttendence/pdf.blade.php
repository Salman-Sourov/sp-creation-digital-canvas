<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    --}}
    <style>
        table {

            border-collapse: collapse;
            width: 100%;
        }

        /* Apply the Nikosh Bangla font to elements with the .bangla class */

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header p {
            display: inline-block;
            margin: 0 10px; /* Add some spacing between elements */
        }

        .header-content {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Attendance Report</h2>
        <img src="{{ public_path("Custom/img/btrc-logo.png") }}" style="height: 80px;" alt="">
        <div class="header-content">
            <!-- Display Name, Date, Designation, and Department in one line -->
            <p> Name: {{ $name }}</p>

            <p> Designation: {{ $designation }}</p>
            <p> Department: {{ $department }}</p>
            <p> Printing Date: {{ date('Y-m-d') }} </p>
        </div>
    </div>


    <br><br>
    <table>

        <tr>
            <th>Date</th>
            <th>status</th>
            <th>inTime</th>
            <th>outTime</th>
            <th>lateStatus</th>
            <th>totalDuty</th>
            <th>isFriday</th>
            <th>holiday</th>
        </tr>

            @foreach ($reportData as $data)
        <tr>
            <td>{{ $data['date'] }}</td>
            @php

            $officetime = date('h:i A',strtotime($officeTime));
            if($data['status'])
            {
            $status = 'Present';
            }
            else{
            $status = 'Absent';
            }
            @endphp
            @if($status == 'Present')
            <td>
                <span>{{ $status }}</span>
            </td>
            @elseif($status == 'Absent')
            <td>
                <span>{{ $status }}</span>
            </td>
            @endif

            @php
            if($data['inTime'])
            {
            $inTime = date('h:i A',strtotime($data['inTime']));
            }
            else{
            $inTime = '-';
            }

            @endphp
            <td>{{ $inTime }}</td>

            @php
            if($data['outTime'])
            {
            $outTime = date('h:i A',strtotime($data['outTime']));
            }
            else{
            $outTime = '-';
            }
            @endphp
            <td>{{ $outTime }}</td>
            @php
            if($inTime != '-')
            {
            if($inTime>$officetime)
            {
            $time = 'Late';
            }
            else{
            $time = 'On Time';
            }
            }
            else {
            $time = '-';
            }
            @endphp
            @if($time == 'On Time')
            <td>
                <span>{{ $time }}</span>
            </td>
            @elseif($time == 'Late')
            <td>
                <span>{{ $time }}</span>
            </td>
            @else
            <td>
                {{ $time }}
            </td>
            @endif
            @php
            if( $inTime != '-' && $outTime != '-')
            {
            $time1 = new DateTime($inTime);
            $time2 = new DateTime($outTime);
            $interval = $time1->diff($time2);
            $duty = $interval->format('%h:%i');
            //$duty = $outTime - $inTime;
            }
            else{
            $duty = '-';
            }
            @endphp
            @if($duty != '-')
            <td>{{ $duty.' '.'Hours' }}</td>
            @else
            <td>{{ $duty }}</td>
            @endif
            @php
            if($data['isFriday'])
            {
            $fri = 'Friday';
            }
            else {
            $fri = '-';
            }
            @endphp
            @if($fri == '-' )
            <td>{{ $fri }}</td>
            @elseif ($fri != '-')
            <td>
                <span>{{ $fri }}</span>
            </td>
            @endif

            <td>{{ $data['holiday'] }}</td>

        </tr>
        @endforeach

    </table>
</body>

</html>
