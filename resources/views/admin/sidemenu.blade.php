<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.pages.welcome')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#alerts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bell"></i><span>Alerts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#jobs-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-briefcase"></i><span>Jobs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-earmark-text"></i><span>Reports</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('admin.pages.users')}}">
                <i class="bi bi-people"></i><span>Users</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('admin.pages.chats')}}">
                <i class="bi bi-bar-chart"></i><span>Charts</span>
            </a>

        </li><!-- End Charts Nav -->


        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.pages.profile')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->




    </ul>

</aside><!-- End Sidebar-->
