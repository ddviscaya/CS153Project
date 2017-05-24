<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME</title>
<!-- <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">


    <h2>User Account</h2>
    <h3>Welcome <?php echo $user['username']; ?>!</h3>
    <div class="account-info">
        <p><b>Username: </b><?php echo $user['username']; ?></p>
        <p><b>Name: </b><?php echo $user['name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
        <p><b>Address: </b><?php echo $user['address']; ?></p>
        <p><b>Birthday: </b><?php echo $user['birthdate']; ?></p>
        <p><b>Usertype: </b><?php echo $user['user_type']; ?></p>

        <?php echo '<a href="' . base_url() . 'index.php/users/delete_acct/' . $user['id'] . '">' . 'Delete' . '</a>'; ?>
    </div>
</div>
</body>
</html>
