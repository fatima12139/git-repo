<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <meta charset="utf-8">
    <title>User login and register</title>
  </head>
  <body style="background-image:url(image/bg.jpg); color:#fff; margin-top:8%;">
    <div class="container">
      <div class="Login-box">


      <div class="row">


      <div class="col-md-6 login-left">
          <h2>Login Here</h2>
          <form class="" action="validation.php" method="post">
            <div class="form-group">
              <label for="">UserName</label>
              <input type="text" name="User" value="" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" value="" class="form-control"required>
            </div>
            <button type="submit" name="button" class="btn btn-primary">Login</button>
          </form>
      </div>
      <div class="col-md-6 login-right">
        <h2>Register Here</h2>
        <form class="" action="Register.php" method="post">
          <div class="form-group">
            <label for="">UserName</label>
            <input type="text" name="User" value="" class="form-control"required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" value="" class="form-control"required>
          </div>
          <button type="submit" name="button" class="btn btn-primary">Register</button>
        </form>
      </div>

      </div>
    </div>
      </div>

  </body>
</html>
