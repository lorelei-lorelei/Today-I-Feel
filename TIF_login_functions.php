<?php
const VALID_PASSWORD ="testing123";

function validate_password(){
  if(isset($_SESSION['password'])){
    $loggedin = ($_SESSION['password'] == VALID_PASSWORD);
  } else {
    $loggedin = false;
  }
  return $loggedin;
}

function require_login(){
  $loggedin = validate_password();

  if(!$loggedin){
    include 'TIF_login.php';
    exit();
  }
}

function validate_logout(){
  if(isset($_GET['logout'])){
    session_destroy();
    header('Location: /TIF_form.php');
  }
}

function login(){
  if(!empty($_POST)){
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['password'] = $_POST['password'];

  header('Location: /TIF_form.php');
  }
}
