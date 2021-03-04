<div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                        Users
                    </a>
                    <a class="nav-link" href="{{ route('category') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                        Category
                    </a>
                    <a class="nav-link" href="{{ route('job') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                        Jobs
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->role }}
            </div>
        </nav>
    </div>

