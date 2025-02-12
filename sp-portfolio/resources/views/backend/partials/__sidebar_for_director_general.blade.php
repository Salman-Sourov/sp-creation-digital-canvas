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
        href="#"
        class="nav-link @if($commons['current_menu'] == 'depertment') active @endif"
    >
        <i class="nav-icon fas fa-list"></i>
        <p>Add Department</p>
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
        href="#"
        class="nav-link @if($commons['current_menu'] == 'employee') active @endif"
    >
        <i class="nav-icon fas fa-plus"></i>
        <p>Add Employee</p>
    </a>
</li>


<li class="nav-item @if($commons['main_menu'] == 'employee_index') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['current_menu'] == 'employee_index') active @endif"
    >
        <i class="nav-icon fas fa-plus"></i>
        <p>Manage Employee</p>
    </a>
</li>

<li class="nav-item @if($commons['main_menu'] == 'Excel') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == '') active @endif"
    >
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
           Attendence
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">




    </ul>
</li>

<li class="nav-item @if($commons['main_menu'] == 'trainer') menu-open @endif">
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == 'trainer') active @endif"
    >
        <i class="nav-icon fas fa-user-shield"></i>
        <p>
           Payroll
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a
                href="#"
                class="nav-link @if($commons['current_menu'] == 'trainer_create') active @endif"
            >
                <i class="fas fa-plus nav-icon"></i>
                <p>Sallary Generate</p>
            </a>
        </li>

        <li class="nav-item">
            <a
                href=""
                class="nav-link @if($commons['current_menu'] == 'trainer_index') active @endif"
            >
                <i class="fas fa-list nav-icon"></i>
                <p>Manage Sallary</p>
            </a>
        </li>

        <li class="nav-item">
            <a
                href=""
                class="nav-link @if($commons['current_menu'] == 'trainer_create') active @endif"
            >
                <i class="fas fa-plus nav-icon"></i>
                <p>Generate Report</p>
            </a>
        </li>
    </ul>
</li>
