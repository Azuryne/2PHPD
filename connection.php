<?php
include('common/header.php');
$email = $_GET['email'] ?? '';
?>
<div class='container d-flex justify-content-center'>
<form method='POST' class="col-md-6" action="/forum/private/connectUser.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php
include('common/footer.php');