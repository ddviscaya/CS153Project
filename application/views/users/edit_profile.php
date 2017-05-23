<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="container">

      <br><br>
      <h2>EDIT PROFILE</h2>
      <br>
		
        <?php
			echo '<u><h4>' . $user['name'] . '</h4></u>';
            echo '<p><b>Email: </b>' . $user['email'] . '</p>';
            echo '<p><b>Address: </b>' . $user['address'] . '</p>';
            echo '<p><b>Birthday: </b>' . $user['birthdate'] . '</p>';
            echo '<p><b>Usertype: </b>' . $user['user_type'] . '</p>';
          echo '<br>';
		  
        ?>
		
		<form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <!-- username -->
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo !empty($user['username'])?$user['username']:''; ?>">
            <?php echo form_error('username','<span class="help-block">','</span>'); ?>
        </div>
        <!-- address -->
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo !empty($user['address'])?$user['address']:''; ?>">
            <?php echo form_error('address','<span class="help-block">','</span>'); ?>
        </div>
        <!-- bday -->
        <div class="form-group">
            <input type="text" class="form-control" name="birthdate" placeholder="Birthdate" value="<?php echo !empty($user['birthdate'])?$user['birthdate']:''; ?>">
            <?php echo form_error('birthdate','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn-primary" value="Submit"/>
        </div>
    </form>

      </div>
  </div>
</body>
</html>
