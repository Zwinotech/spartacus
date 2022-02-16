<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Dashboard & Apps</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <span>Dashboard</span>
                            <span class="pull-right-container">
					            <i class="fa fa-angle-right pull-right"></i>
					        </span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <span>Courses</span>
                            <span class="pull-right-container">
					            <i class="fa fa-angle-right pull-right"></i>
					        </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="/courses"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <span>Students</span>
                            <span class="pull-right-container">
					            <i class="fa fa-angle-right pull-right"></i>
					        </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="/students"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a></li>
                            <li><a href="/student/add"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <span>Content</span>
                            <span class="pull-right-container">
					            <i class="fa fa-angle-right pull-right"></i>
					        </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="/students"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Home</a></li>
                            <li><a href="/student/add"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>About</a></li>
                            <li><a href="/student/add"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Services</a></li>
                            <li><a href="/student/add"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Contact</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="sidebar-footer">
        <a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
        <a href="#" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
        <a href="{{ route('logout') }}" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
    </div>
</aside>
