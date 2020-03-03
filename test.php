<?php
$conn = mysqli_connect('localhost', 'root', 'root', '2phpd');
$result = mysqli_query($conn, 'SELECT password from users where email = \'t@t.com\'');
$result = mysqli_fetch_assoc($result);
$result = $result['password'];
$result = password_verify('toto', $result) === true ?  'Match' : 'No Match';
echo $result;