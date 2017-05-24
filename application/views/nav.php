<nav class="navbar navbar-inverse bg-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
              <a href="#" class="navbar-brand"></a>
            </div>
            <div>

              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php if ($this->session->userdata('LoggedIn')){ ?>

<!-- <<<<<<< HEAD -->
                  <li class="dropdown">
                    <?php if ($user['user_type'] == 'admin') { ?>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                      <ul class="dropdown-menu">
                        <li>  <a href="<?php echo base_url(); ?>index.php/users/view_all">View Users</a></li>
                        <li>  <a href="<?php echo base_url(); ?>index.php/users/create_user">Create a User</a></li>
                        <li> <a href="<?php echo base_url(); ?>index.php/users/edit_profile">Edit Profile</a></li>
                        <li>  <a href="<?php echo base_url(); ?>index.php/users/logout">Logout</a></li>
                      </ul>
                    <?php } else { ?>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                      <ul class="dropdown-menu">
                        <li>  <a href="<?php echo base_url(); ?>index.php/users/view_all">View Users</a></li>
                        <li> <a href="<?php echo base_url(); ?>index.php/users/edit_profile">Edit Profile</a></li>
                        <li>  <a href="<?php echo base_url(); ?>index.php/users/logout">Logout</a></li>
                      </ul>
                    <?php } ?>
<!-- ======= -->
                <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">dropdown</a>
                <ul class="dropdown-menu">
                <li>  <a href="<?php echo base_url(); ?>index.php/users/view_all">View Users</a></li>
				        <li> <a href="<?php echo base_url(); ?>index.php/users/edit_profile">Edit Profile</a></li>
                <li>  <a href="<?php echo base_url(); ?>index.php/users/logout">Logout</a></li> -->
<!-- >>>>>>> aedd8319391fad55ba24d221288048031c426a41 -->

                </ul>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
