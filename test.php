<?php
if (isset($_GET['data'])){
    echo 'Voici des données randoms';
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test AJAX</title>
</head>
<body>
    <button id='ajax'>Send AJAX request</button>
</body>
<script>
    let button = document.getElementById('ajax');
    button.addEventListener('click', function(event){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'private/verifForm.php');
        let body = new FormData();
        body.append('email','test@test.be3');
        body.append('firstname','test');
        body.append('lastname','test');
        body.append('age','18');
        body.append('password','test');
        body.append('repeatPassword','test');
        xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200){
                console.log(xhr.responseText)
            }
        }
        xhr.send(body);
        
    })
</script>
</html>
<?php
}
