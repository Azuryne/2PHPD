<?php
include('common/header.php');
?>
<div class="container">
    <h1 class="d-flex justify-content-center">Welcome to the forum <?php echo $_SESSION['user']['firstname'] ?? "" ?></h1>

</div>
<?php
include('common/footer.php');