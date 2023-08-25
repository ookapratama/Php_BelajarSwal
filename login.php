<?php
include 'db.php';

if (isset($_POST['submit'])) {

   // jika data kosong
   if ($_POST['username'] == '' || $_POST['password'] == '') {
      echo "
         <script>
         alert('Lengkapi data form');
         history.back();
         </script>
      ";
      return false;
   }

   global $conn;
   $username = $_POST['username'];
   $password = $_POST['password'];

   $get = mysqli_query($conn, "SELECT * FROM user WHERE password = '$password' AND username = '$username'");

   $result =  mysqli_num_rows($get);
   // var_dump($result);

   // jika sukses query
   if ($result >  0) {
      $data = mysqli_fetch_assoc($get);

      session_start();
      $_SESSION['sukses_login'] = true;
      $_SESSION['nama'] = $data['nama'];
      
      echo "
         <script>
         alert('Sukses Login');
         location.href = 'index.php';
         </script>
      ";

   } else {
      echo "
         <script>
         alert('Gagal Login');
         history.back();
         </script>
      ";
   }
}

?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Bootstrap demo</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>

   <h1 class="text-center m-5 fw-bold text-uppercase">Login</h1>

   <form action="" method="post">

      <div class="text-white container-fluid bg-secondary rounded p-5 col-5">
         <label for="username">Username</label>
         <input type="text" placeholder="Masukkan username" name="username" class="form-control">
         <label for="username" class="mt-3">Password</label>
         <input type="password" placeholder="Masukkan password" name="password" class="form-control">
         <div class="d-flex justify-content-between ">
            <span class="mt-4">Belum punya akun ? <a href="register.php" class="text-warning"> Register</a></span>
            <button type="submit" name="submit" class="btn btn-primary mt-4 px-5 py-2 rounded-pill">Login</button>
         </div>
      </div>

   </form>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

</body>

</html>