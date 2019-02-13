<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Call Center</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" style="color: white">
        <?php
        if($this->session->userdata('username')){
            echo "<p>You are logged in as ".$this->session->userdata('username')." (".$this->session->userdata('type').")<p>";

        }

        ?>
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img style="border-radius: 50%;height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;" src="<?php echo base_url();?>assets/img/event.png">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item btn-outline-primary" href="<?php echo base_url();?>index.php/users/editProfile">Edit Profile</a>
                <a class="dropdown-item" href="#"><?php echo $this->session->userdata('fullname');?></a>
                <a class="dropdown-item" href="#"><?php echo $this->session->userdata('typr');?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

