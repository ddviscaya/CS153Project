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
      <h2>Users</h2>
      <?php
        $query = $this->db->get('users');
       ?>
      <div class="account-info">
        <?php foreach ($query->result() as $q) { ?>
          <br>
          <?php if ($q->id != $user['id']){ ?>
            <?php if ($user['user_type'] == 'admin'){ ?>
                <p><b>ID: </b><?php echo $q->id; ?></p>
                <p><b>Username: </b><?php echo $q->username; ?></p>
                <p><b>Name: </b><?php echo $q->name; ?></p>
                <p><b>Email: </b><?php echo $q->email; ?></p>
                <p><b>Address: </b><?php echo $q->address; ?></p>
                <p><b>Birthday: </b><?php echo $q->birthdate; ?></p>
                <p><b>Usertype: </b><?php echo $q->user_type; ?></p>
            <?php }else{ ?>
                <p><b>Name: </b><?php echo $q->name; ?></p>
                <p><b>Birthday: </b><?php echo $q->birthdate; ?></p>
                <p><b>Usertype: </b><?php echo $q->user_type; ?></p>

            <?php } ?>
            <?php } ?>
        <?php } ?>
      </div>
      <!-- <a href="<?php echo base_url(); ?>index.php/users/logout" class="btn btn-info" role="button">Logout</a> -->
  </div>
</body>
</html>
