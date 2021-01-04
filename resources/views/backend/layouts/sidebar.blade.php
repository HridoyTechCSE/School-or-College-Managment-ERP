<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Users
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('users.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View User</p>
                    </a>
                </li>


            </ul>
        </li>



        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage profile
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('profiles.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Profile</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('profiles.password.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Setup
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('setups.student.class.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Class</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setups.student.year.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Year</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setups.student.group.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Group</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setups.student.shift.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Shift</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('setups.fee.category.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fee Category</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setups.fee.amount.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fee Category Amount</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('setups.exam.type.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Type</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setups.subject.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subject View</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setup.assign.subject.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Assign Subject </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('setups.designation.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Designation </p>
                    </a>
                </li>


            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Student Managment
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('students.registation.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Registation</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('students.Roll.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Roll Generate</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('students.reg.fee.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Registation fee</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('students.monthly.fee.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Monthly fee</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('students.exam.fee.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam fee</p>
                    </a>
                </li>


            </ul>
        </li>




        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Employee
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('employees.reg.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Registation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('employees.salary.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Salary</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('employees.leave.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Leave</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('employees.attend.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Attendace</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('employees.monthly.salary.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Monthly Salary</p>
                    </a>
                </li>
            </ul>
        </li>



        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Marks Managment
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('marks.add')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Entry</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('marks.edit')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Edit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('marks.grade.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Grade Point</p>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Account Managment
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('accounts.fee.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Fee</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('accounts.salary.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Salary</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('accounts.cost.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Other Cost</p>
                    </a>
                </li>


            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Reports Managment
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('reports.profit.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Monthly Profite</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('reports.marksheet.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marksheet</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('reports.attendance.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Attendance Report</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('reports.result.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Result</p>
                    </a>
                </li>
            </ul>
        </li>



    </ul>
</nav>
<!-- /.sidebar-menu -->
