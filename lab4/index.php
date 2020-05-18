<?php

        session_start();
        if(isset($_SESSION['color'])) {
          echo $_SESSION['color'];
          $clr=$_SESSION['color'];
          #var_dump($clr);
          unset($_SESSION['color']);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Selector</title>
</head>
<body class="container" >

  <h1> Choose color</h1>
  <div class="row mx-md-n5"> 
    <form action='1.php' onsubmit=" return checkColor();" class="mx-auto justify-content-center form" method="POST">
    <div class="form-check">
    
      <label class="form-check-label color orange" for="defaultCheck1">
      <input class="form-check-input" name="color" type="radio" value="#FFBD33" id="defaultCheck1">
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label color red" for="defaultCheck2">
      <input class="form-check-input" name="color" type="radio" value="#FF5733" id="defaultCheck2">
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label color brown" for="defaultCheck3">
      <input class="form-check-input" name="color" type="radio" value="#FFDEAD" id="defaultCheck3">
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label color gray" for="defaultCheck4">
      <input class="form-check-input" name="color" type="radio" value="#D3D3D3" id="defaultCheck4">
      </label>
    </div>

    <button type="submit" class="btn btn-primary  ">Submit</button>
    </form>
  </div>

<script>
    const checkColor = () => {
    let flag = false
    const inputs = document.getElementsByName('color');
    const btn = document.getElementsByTagName('button');
    const form = document.forms[0]
    for (let i=0; i<inputs.length; i++) {
        if (inputs[i].checked) {
          return 
        }
    }
    
    btn[0].textContent = "You must chose the color!"
    btn[0].classList.remove('btn-primary');
    btn[0].classList.add('btn-danger');
    setTimeout(()=>{
      btn[0].classList.remove('btn-danger');
      btn[0].classList.add('btn-primary');
      btn[0].textContent = "Submit"
    },500)
    
    return false
  }

  


</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>