<?php
include('common/header.php');
$user ='';
if(isset($_SESSION['user'])){
    $user = $_SESSION['user']->firstname;
}
?>
<div class="container">
    <h1 class="d-flex justify-content-center">Welcome to the forum <?php echo $user ?></h1>

</div>
<?php
include('common/footer.php');