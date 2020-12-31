<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">MENU NAVIGATION</div>
            <ul class="pcoded-item pcoded-left-item">
               

                <li class="pcoded-hasmenu @if(Route::current()->getName() == 'dashboard')
    active pcoded-trigger
@endif">
                    <a href="/dashboard" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">DASHBOARD</span>
                    </a>
                </li>
                <!-- <li class="pcoded-hasmenu">
                    <a href="#" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Setup</span>
                        <span class="pcoded-badge label label-warning">sub-menus</span>
                    </a>
                    <ul class="pcoded-submenu">
                      
                        <li class=" pcoded-hasmenu">
                            <a href="{{ route('permissions.index')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Permission</span>
                            </a>
                        </li>
                        <li class=" pcoded-hasmenu">
                            <a href="{{ route('roles.index')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Roles</span>
                            </a>
                        </li>
                        <li class=" pcoded-hasmenu">
                            <a href="" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Category</span>
                            </a>
                          
                        </li>
                      
                    </ul>
                </li> -->
                <li class="pcoded-hasmenu">
                    <a href="{{ route('mdas.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">MDAs</span>
                        <!-- <span class="pcoded-badge label label-success">sub-menus</span> -->
                    </a>
                </li>
                <li class="pcoded-hasmenu">
                    <a href="{{ route('economic_category.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Economic Category</span>
                        <!-- <span class="pcoded-badge label label-info">sub-menus</span> -->
                    </a>
                </li>
                <li class="pcoded-hasmenu">
                    <a href="{{ route('nature_of_debt.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Nature of Debt</span>
                        <!-- <span class="pcoded-badge label label-danger">sub-menus</span> -->
                    </a>
                </li>
                <!-- <li class="pcoded-hasmenu">
                    <a href="{{ route('arrears_category.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Category of Arrears</span>
                        <span class="pcoded-badge label label-primary">sub-menus</span>
                    </a>
                </li> -->

                <li class="pcoded-hasmenu @if(Route::current()->getName() == 'opr.index')
    active pcoded-trigger
@endif">
                    <a href="{{ route('opr.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Search</span>
                        <!-- <span class="pcoded-badge label label-primary">sub-menus</span>  -->
                    </a>
                </li>

                <li class="pcoded-hasmenu">
                    <a href="{{ route('arrears.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Arrears</span>
                        <!-- <span class="pcoded-badge label label-primary">sub-menus</span> -->
                    </a>
                </li>

                <li class="pcoded-hasmenu">
                    <a href="{{ route('arrears.feedback') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Feedback</span>
                        <!-- <span class="pcoded-badge label label-primary">sub-menus</span> -->
                    </a>
                </li>

                <li class="pcoded-hasmenu">
                    <a href="{{ route('reports.index')}}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Reports</span>
                   
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>