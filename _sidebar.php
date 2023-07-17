<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.php"><span>Logo</span></a>
                </div>
                <div class="toggler">
                    <a href="javascript:void(0)" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Information List</li>

                <li class="sidebar-item <?= checkUrl('addPerson','index')?> has-sub">
                    <a href="javascript:void(0)" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Personal</span>
                    </a>

                    <ul class="submenu <?= checkUrl('addPerson','index')?>">
                        <li class="submenu-item <?= checkUrl('addPerson')?> ">
                            <a href="addPerson.php">Add Personal</a>
                        </li>

                        <li class="submenu-item <?= checkUrl('','index')?>">
                            <a href="index.php">Show Personal</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= checkUrl('addCourse','viewCourse','courses')?> has-sub">
                    <a href="javascript:void(0)" class='sidebar-link'>
                        <i class="bi bi-pen-fill"></i>
                        <span>Courses</span>
                    </a>
                    <ul class="submenu <?= checkUrl('addCourse','viewCourse','courses')?>">
                        <li class="submenu-item <?= checkUrl('addCourse')?> ">
                            <a href="addCourse.php">Add Courses</a>
                        </li>
                        <li class="submenu-item <?= checkUrl('courses','viewCourse')?>">
                            <a href="courses.php">Show Courses</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= checkUrl('experience','addExperience')?> has-sub">
                    <a href="javascript:void(0)" class='sidebar-link'>
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Experience</span>
                    </a>
                    <ul class="submenu <?= checkUrl('experience','addExperience')?>">
                        <li class="submenu-item <?= checkUrl('addExperience')?>">
                            <a href="addExperience.php">Add Experience</a>
                        </li>
                        <li class="submenu-item <?= checkUrl('experience')?>">
                            <a href="experience.php">Show Experience</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>