<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Judul -->
    <title>Login | CRUD</title>

    <!-- CSS -->
    <link rel="stylesheet" href="Login/login.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="card-login">
      <h1>Login</h1>

      <div class="form-floating button input ">
        <input
          type="email"
          class="form-control"
          id="floatingInput"
          placeholder="name@example.com"
        />
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating input">
        <input
          type="password"
          class="form-control"
          id="floatingPassword"
          placeholder="Password"
        />
        <label for="floatingPassword">Password</label>
      </div>
      <button type="submit" class="btn btn-outline-warning mt-5 ms-5 me-5 bg-darkorange" onclick="alert(gagal)"><a href="">Login</a></button>
      <br>

      <h6 class="mb-4">atau</h6>

      <h6><a href="login-as.php">Login Sebagai Dosen</a></h6>
    </div>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  >
  </script>

  <script>
    const gagal = "GAGAL LOGIN, HARAP MASUK SEBAGAI DOSEN";
  </script>
</html>
