<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets.css">
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- As a heading -->

<!-- <nav class="navbar sticky-top border-bottom mb-1"> -->
<nav class="navbar border-bottom border-secondary">
  <div class="container-fluid justify-content-center ">
    <span>UNIVERSITAS DIPONEGORO</span>
  </div>
</nav>

<div class="cotitle container-lg ps-5">
  <span class="title">Login</span>
  <span class="title title2">Mahasiswa</span>
  
  <form class="font-form"action="" method="post">

  <div class="row">
    <div class="col-3">
      <div class="form-group col">
        <label for="email" class="col-form-label">Email</label>
      </div>
      <div class="form-group col">
        <label for="password" class="col-form-label">Password</label>
      </div>
    </div>
    <div class="col-7">
      <div class="col form-group">
        <input type="email" id="email" name="email"class="form-control" >
      </div>
      <div class="col form-group">
        <input type="password" id="password" name="password"class="form-control" >
      </div>
      <button type="button" class="btn btn-primary blogin">Login</button>
    </div>
    <!-- <div class="col pfp">
      <div class="col">
        <button type="button" class="btn btn-primary blogin">Login</button>
      </div> -->
        
    </div>
  </div>
  </form>
</div>

  
</body>
</html>