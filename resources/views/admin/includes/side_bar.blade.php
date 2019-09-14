<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fa fa-2x fa-user-circle" aria-hidden="true" style="color: blue;"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
            <i class="fas fa-lock fa-cog"></i>
            <span>Access Control</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('roles') }}">Roles</a>
                <a class="collapse-item" href="{{ url('users') }}">Users</a>
                <a class="collapse-item" href="{{ url('modules') }}">Modules</a>
                <a class="collapse-item" href="{{ url('links') }}">Links</a>
                <a class="collapse-item" href="{{ url('permissions') }}">Permissions</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
            <i class="fas fa-fw fa-cog"></i>
            <span>Blog</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Posts</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<script>
    var path = window.location.href;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
    // console.log(path);
    $(".collapse-item").each(function () {
        var href = $(this).attr('href');
        if (path === href) {
            var thisNav = $(this).closest('.nav-item');
            thisNav.find('.nav-link').removeClass('collapsed');
            thisNav.find('.nav-link').attr('aria-expanded', true);
            thisNav.find('.collapse').addClass('show');
        }
    });

</script>
