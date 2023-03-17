<div>
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            @if ($role == 'admin')
                <li class="nav-item nav-category">Account Management</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#account" aria-expanded="false"
                        aria-controls="account">
                        <i class="menu-icon mdi mdi-account"></i>
                        <span class="menu-title">Account Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="account">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/account/user-management">User
                                    Management</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/account/admin-management">Admin
                                    Management</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/account/operator-management">Operator
                                    Management</a></li>
                        </ul>
                    </div>
                </li>
            @endif
            @if ($role == 'operator')
                <li class="nav-item nav-category">Device Management</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#device" aria-expanded="false"
                        aria-controls="device">
                        <i class="menu-icon mdi mdi mdi-puzzle"></i>
                        <span class="menu-title">Device Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="device">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/device/device-management">Device
                                    Management</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/device/data-management">Device Data</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="/device/usedev-management">User Device</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

        </ul>
    </nav>

</div>
