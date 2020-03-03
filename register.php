<?php
include('common/header.php');
?>
<div class='container d-flex justify-content-center'>
  <form id='registerForm' method='POST' class="col-md-6" action="private/verifForm.php">
    <div class="form-group">
      <label for="inputEmail">Email address</label>
      <input id="email" name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
        placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="firstname">Firstname</label>
      <input name="firstname" type="text" class="form-control" id="inputFirstname" aria-describedby="firstnameHelp"
        placeholder="Enter firstname">
    </div>
    <div class="form-group">
      <label for="inputLastname">Lastname</label>
      <input name="lastname" type="text" class="form-control" id="inputLastname" aria-describedby="lastnameHelp"
        placeholder="Enter lastname">
    </div>
    <div class="form-group">
      <label for="ageInput">Age</label>
      <input id="age" name="age" type="number" class="form-control" id="ageInput" aria-describedby="ageHelp"
        placeholder="Enter age">
    </div>
    <div class="form-group">
      <label for="inputPassword">Password</label>
      <input id="password" name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="repeatPassword">Repeat password</label>
      <input id="repeatPassword" name="repeatPassword" type="password" class="form-control" id="repeatPassword"
        placeholder="Repeat password">
    </div>
    <button id="formSubmit" type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
<script>
  let button = document.getElementById('formSubmit');
  button.addEventListener('click', function (event) {
    event.preventDefault();
    xhrFunc();
    // fetchFunc();

  })

  function handleRequest(res) {
    let inputs = document.querySelectorAll('#registerForm input');
    for (let input of inputs){
      input.className = input.className.replace('is-invalid', '');
    }

    if (res.error.length === 0) {
      window.location.href = 'connection.php?email=' + encodeURIComponent(document.getElementById('email').value);  
    }
    else {
      for(let error of res.error){
        let inputError =  document.getElementById(error);
        inputError.className = inputError.className + ' is-invalid';

      }
    }
  }

  function fetchFunc() {
    const formData = new FormData(document.getElementById('registerForm'));
    let jsonObject = {};
    for (const [key, value] of formData.entries()) {
      jsonObject[key] = value;
    }
    fetch('private/verifForm.php', {
      method: 'POST',
      body: JSON.stringify(jsonObject)
    }).then(res => res.json()).then(json => console.log(json)).catch(error => console.error(error))
  }

  function xhrFunc() {
    let xhr = new XMLHttpRequest();
    let data = new FormData(document.getElementById('registerForm'));
    xhr.open('POST', './private/verifForm.php');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        handleRequest(JSON.parse(xhr.responseText));
      }
    }
    xhr.send(data);
  }

</script>
<?php
include('common/footer.php');