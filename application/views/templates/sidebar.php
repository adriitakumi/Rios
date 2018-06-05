<div class="sidebar" data-color="purple" data-image="<?php echo base_url(); ?>assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                <img src="<?php echo base_url(); ?>assets/img/white.png" style="width: 40%; margin: -25px 0" />
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
            <li class="<?php if(isset($active) && $active == 'circulation') echo 'active'; ?>">
                <a href="<?php echo site_url('circulation/') ?>">
                    <i class="pe-7s-id"></i>
                    <p>Circulation</p>
                </a>
            </li>
        </ul>
    </div>
</div>