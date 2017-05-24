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
      <h2>Users</h2>
      <br>
        <?php foreach ($users as $q) {
          if ($q->username != $user['username']){
            if ($user['user_type'] == 'admin') {

            // echo '<u><h4>' . $q->name . '</h4></u>';
            echo '<a href="' . base_url() . 'index.php/users/update_user/' . $q->id . '"><u><h4>' . $q->name . '</h4></u></a>';
            echo '<p><b>Email: </b>' . $q->email . '</p>';
            echo '<p><b>Address: </b>' . $q->address . '</p>';
            echo '<p><b>Birthday: </b>' . $q->birthdate . '</p>';
            echo '<p><b>Usertype: </b>' . $q->user_type . '</p>';
            echo '<a href="' . base_url() . 'index.php/users/delete_user/' . $q->id . '">' . 'Delete' . '</a>';
            echo '<br><br>';
          } else {
            echo '<u><h4>' . $q->name . '</h4></u>';
            echo '<p><b>Birthday: </b>' . $q->birthdate . '</p>';
            echo '<p><b>Usertype: </b>' . $q->user_type . '</p>';
            echo '<br>';
            }
          } ?>

      </div>
  </div>
</body>
</html>
