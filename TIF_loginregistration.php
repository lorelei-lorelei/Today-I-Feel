<?php
if(!empty($_POST)){
  $checkusername = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $checkemail = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  $checkname = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

  $connection = mysqli_connect("127.0.0.1", "root", "", "tif");

  $secure_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $isUserAvailableQuery = "SELECT username FROM tif_users WHERE username =?";
  $stmt = mysqli_prepare($connection, $isUserAvailableQuery);
  mysqli_stmt_bind_param($stmt, "s", $checkusername);
  mysqli_stmt_execute($stmt);
  $isUserAvailableResults = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);

  $isUserAvailable = false;
  print_r($isUserAvailableResults);

  if(mysqli_num_rows($isUserAvailableResults)== 0){
    $isUserAvailable = true;
  } elseif (mysqli_num_rows($isUserAvailableResults) == 1){
    $isUserAvailable = false;
  } else {
    $isUserAvailable = false;
  }

    $insertUserQuery = "INSERT INTO tif_users (username, password, name, email) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_prepare($connection, $insertUserQuery);
    mysqli_stmt_bind_param($stmt, 'ssss', $checkusername, $secure_password, $checkname, $checkemail);
    mysqli_stmt_execute($stmt);
    $insertUserResults = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

}

?>
<HTML>
 <meta charset="utf-8">
   <head>
   <title>Today I Feel - User Registration</title>
     <h1>Today I Feel - User Registration</h1>
  </head>
  <body>
    <form method="post" action="">
      <label for="name">Name:</label>
        <input name="name" type="text">
      <label for="email">Email:</label>
        <input name="email" type="text">
      <label for="username">Username:</label>
        <input name="username" type="text">
      <label for="password">Password:</label>
        <input name="password" type="password">
      <button type="submit">Register</button>
    </form>

<?php
print_r($_POST);
