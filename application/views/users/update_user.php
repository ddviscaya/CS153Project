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
      <h2>UPDATE</h2>
      <br>
		
        <?php
          if ($user['user_type'] == 'admin') {
			echo '<u><h4>' . $value['name'] . '</h4></u>';
            echo '<p><b>Email: </b>' . $value['email'] . '</p>';
            echo '<p><b>Address: </b>' . $value['address'] . '</p>';
            echo '<p><b>Birthday: </b>' . $value['birthdate'] . '</p>';
            echo '<p><b>Usertype: </b>' . $value['user_type'] . '</p>';
          } else {
            echo '<u><h4>' . $value['name'] . '</h4></u>';
            echo '<p><b>Birthday: </b>' . $value['birthdate'] . '</p>';
            echo '<p><b>Usertype: </b>' . $value['user_type'] . '</p>';
          }
          echo '<br>';
		  
        ?>
		
		<form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($value['name'])?$value['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($value['email'])?$value['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <!-- username -->
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo !empty($value['username'])?$value['username']:''; ?>">
            <?php echo form_error('username','<span class="help-block">','</span>'); ?>
        </div>
        <!-- address -->
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo !empty($value['address'])?$value['address']:''; ?>">
            <?php echo form_error('address','<span class="help-block">','</span>'); ?>
        </div>
        <!-- bday -->
        <div class="form-group">
            <input type="text" class="form-control" name="birthdate" placeholder="Birthdate" value="<?php echo !empty($value['birthdate'])?$value['birthdate']:''; ?>">
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
			<select type="text" class="form-control" name="user_type" placeholder="user_type" value="<?php echo !empty($value['user_type'])?$value['user_type']:''; ?>">
			  <option>user</option>
			  <option>admin</option>
			</select>
		</div>
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn-primary" value="Submit"/>
        </div>
    </form>

      </div>
  </div>
</body>
</html>
