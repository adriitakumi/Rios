<div class="sidebar" data-color="purple" data-image="<?php echo base_url(); ?>assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Rio's Logo
            </a>
        </div>

        <ul class="nav">
            <li class="<?php if(isset($active) && $active == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo site_url('dashboard/') ?>">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php if(isset($active) && $active == 'books') echo 'active'; ?>">
                <a href="<?php echo site_url('books/') ?>">
                    <i class="pe-7s-notebook"></i>
                    <p>Books</p>
                </a>
            </li>
            <li class="<?php if(isset($active) && $active == 'borrowed_books') echo 'active'; ?>">
                <a href="<?php echo site_url('borrowed_books/') ?>">
                    <i class="pe-7s-id"></i>
                    <p>Borrowed Books</p>
                </a>
            </li>
            <li class="<?php if(isset($active) && $active == 'user') echo 'active'; ?>">
                <a href="<?php echo site_url('Welcome/userprofile') ?>">
                    <i class="pe-7s-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="<?php if(isset($active) && $active == 'tables') echo 'active'; ?>">
                <a href="<?php echo site_url('Welcome/tables') ?>">
                    <i class="pe-7s-note2"></i>
                    <p>Table List</p>
                </a>
            </li>
            <li class="<?php if(isset($active) && $active == 'typo') echo 'active'; ?>">
                <a href="<?php echo site_url('Welcome/typo') ?>">
                    <i class="pe-7s-news-paper"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li class="<?php if(isset($active) && $active == 'icons') echo 'active'; ?>">
                <a href="<?php echo site_url('Welcome/icons') ?>">
                    <i class="pe-7s-science"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="<?php if(isset($active) && $active == 'notifs') echo 'active'; ?>">
                <a href="<?php echo site_url('Welcome/notifs') ?>">
                    <i class="pe-7s-bell"></i>
                    <p>Notifications</p>
                </a>
            </li>
    		<li class="active-pro">
                <a href="upgrade.html">
                    <i class="pe-7s-rocket"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>