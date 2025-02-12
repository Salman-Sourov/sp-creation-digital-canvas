<li
    class="nav-item @if($commons['main_menu'] == 'report') menu-open @endif"
    class="nav-item"
>
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == 'report') active @endif"
    >
        <i class="nav-icon fas far fa-chart-bar"></i>
        <p>
            REPORTS
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li
            class="nav-item @if($commons['main_menu'] == 'report') menu-open @endif"
        >
             <a
                href="#"
                class="nav-link @if($commons['current_menu'] == 'report') active @endif"
            >
                <i class="fa fa-sticky-note" style="font-size: 15px"></i>
                <p>
                    <span class="badge badge-success">Monthly -></span>
                    Report
                </p>
            </a>
        </li>


    </ul>
</li>

<li class="nav-header">Company</li>



<li class="nav-item @if($commons['main_menu'] == 'depertment') menu-open @endif">
    <a
        href="{{ route('department.create') }}"
        class="nav-link @if($commons['current_menu'] == 'depertment') active @endif"
    >
        <i class="nav-icon fas fa-list"></i>
        <p>Add Department</p>
    </a>
</li>

<li class="nav-item @if($commons['main_menu'] == 'designation') menu-open @endif">
    <a
        href="{{ route('designation.create') }}"
        class="nav-link @if($commons['current_menu'] == 'designation') active @endif"
    >
        <i class="nav-icon fas fa-list"></i>
        <p>Add Designation</p>
    </a>
</li>

<li class="nav-item @if($commons['main_menu'] == 'holiday') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['current_menu'] == 'holiday') active @endif"
    >
        <i class="nav-icon fas fa-plus"></i>
        <p> Add Holiday</p>
    </a>
</li>

<li class="nav-header">Employee</li>


{{-- <li class="nav-item @if($commons['main_menu'] == 'activity') menu-open @endif">
    <a
        href=""
        class="nav-link @if($commons['current_menu'] == 'activity_create') active @endif"
    >
        <i class="nav-icon fas fa-plus"></i>
        <p>Position</p>
    </a>
</li> --}}


<li class="nav-item @if($commons['main_menu'] == 'employee') menu-open @endif">
    <a
        href="{{ route('employee.create') }}"
        class="nav-link @if($commons['current_menu'] == 'employee') active @endif"
    >
        <i class="nav-icon fas fa-plus"></i>
        <p>Add Employee</p>
    </a>
</li>


<li class="nav-item @if($commons['main_menu'] == 'employee_index') menu-open @endif">
    <a
        href="{{ route('employee.index') }}"
        class="nav-link @if($commons['current_menu'] == 'employee_index') active @endif"
    >
        <i class="nav-icon fas fa-plus"></i>
        <p>Employee List</p>
    </a>
</li>

<li class="nav-item @if($commons['main_menu'] == 'attendance') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == 'attendance') active @endif"
    >
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
           Attendence
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item @if($commons['main_menu'] == 'attendance') menu-open @endif">
            <a
                href="{{ route('officeTime.index') }}"
                class="nav-link @if($commons['current_menu'] == 'setOfficeTime') active @endif"
            >
                <i class="nav-icon fas fa-list"></i>
                <p>Set Office Time</p>
            </a>
        </li>


    </ul>

    <ul class="nav nav-treeview">

        <li class="nav-item @if($commons['main_menu'] == 'attendance') menu-open @endif">
            <a
                href="{{ route('dailyAttendance.index') }}"
                class="nav-link @if($commons['current_menu'] == 'dailyAttendence') active @endif"
            >
                <i class="nav-icon fas fa-list"></i>
                <p>Daily Attendence</p>
            </a>
        </li>


    </ul>

    <ul class="nav nav-treeview">

        <li class="nav-item @if($commons['main_menu'] == 'attendance') menu-open @endif">
            <a
                href="{{ route('report.index') }}"
                class="nav-link @if($commons['current_menu'] == 'attendance_report') active @endif"
            >
            <i class="fa fa-sticky-note" style="font-size: 15px"></i>
            <p>
                <span class="badge badge-success">Attendance -></span>
                Report
            </p>
            </a>
        </li>


    </ul>


</li>


<li class="nav-item @if($commons['main_menu'] == 'action') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == 'action') active @endif"
    >
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
           Disciplinary Action
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">


        <li class="nav-item @if($commons['main_menu'] == 'action') menu-open @endif">
            <a
                href="{{ route('disciplinary.index') }}"
                class="nav-link @if($commons['current_menu'] == 'disciplanry_action') active @endif"
            >
                <i class="nav-icon fas fa-list"></i>
                <p>Add Disciplanry Action</p>
            </a>
        </li>

        <li class="nav-item @if($commons['main_menu'] == 'action') menu-open @endif">
            <a
                href="{{ route('disciplinary.create') }}"
                class="nav-link @if($commons['current_menu'] == 'take_action') active @endif"
            >
            <i class="nav-icon fas fa-user-check"></i>
                <p>Apply Disciplanry Action</p>
            </a>
        </li>

        <li class="nav-item @if($commons['main_menu'] == 'action') menu-open @endif">
            <a
                href="{{ route('punished.employee.list') }}"
                class="nav-link @if($commons['current_menu'] == 'punishedEmployee_List') active @endif"
            >
            <i class="nav-icon fas fa-user-check"></i>
                <p>Punished Employee List</p>
            </a>
        </li>
    </ul>
</li>





<li class="nav-item @if($commons['main_menu'] == 'leave') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == 'add_leave') active @endif"
    >
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
           Leave Manager
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">


        <li class="nav-item @if($commons['main_menu'] == 'leave') menu-open @endif">
            <a
                href="{{ route('leave.index') }}"
                class="nav-link @if($commons['current_menu'] == 'add_leave') active @endif"
            >
                <i class="nav-icon fas fa-list"></i>
                <p>Add Leave</p>
            </a>
        </li>
    </ul>
</li>



<li class="nav-item @if($commons['main_menu'] == '') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == '') active @endif"
    >
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
           Leave Manager
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">


        <li class="nav-item @if($commons['main_menu'] == '') menu-open @endif">
            <a
                href="{{ route('leave.index') }}"
                class="nav-link @if($commons['current_menu'] == '') active @endif"
            >
                <i class="nav-icon fas fa-list"></i>
                <p>Add Leave</p>
            </a>
        </li>
    </ul>
</li>














