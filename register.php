<?php
include('common/header.php');
?>
<div class='container d-flex justify-content-center'>
<form method='POST' class="col-md-6" action="/forum/private/verifForm.php">
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="firstname">Firstname</label>
    <input name="firstname" type="text" class="form-control" id="inputFirstname" aria-describedby="firstnameHelp" placeholder="Enter firstname">
  </div>
  <div class="form-group">
    <label for="inputLastname">Lastname</label>
    <input name="lastname" type="text" class="form-control" id="inputLastname" aria-describedby="lastnameHelp" placeholder="Enter lastname">
  </div>
  <div class="form-group">
    <label for="ageInput">Age</label>
    <input name="age" type="number" class="form-control" id="ageInput" aria-describedby="ageHelp" placeholder="Enter age">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="inputPassword1">Repeat password</label>
    <input name="repeatPassword" type="password" class="form-control" id="repeatPassword" placeholder="Repeat password">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
<?php
if(isset($_GET['error'])){
  $error = $_GET['error'];
  $message = '';
  echo '<script>';
  switch($error){
    case 'email':
      $message = 'Your email is invalid';
      break;
    case 'password':
      $message = "Passwords don't match";
      break;
    case 'age':
      $message = 'The age must be between 12 and 150';
      break;
    case 'empty':
      $message = 'One of the input is empty';
      break;
  }
  echo "alert(\"{$message}\");";
  echo '</script>';
}
include('common/footer.php');