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

   <h1 class="text-center m-5 fw-bold text-uppercase">Register</h1>

   <form action="" method="post">

      <div class="text-white container-fluid bg-secondary rounded p-5 col-5">
         <label for="nama">Nama lengkap</label>
         <input type="text" placeholder="Masukkan nama lengkap" name="nama" id="nama" class="form-control">
         <label for="username">Username</label>
         <input type="text" placeholder="Masukkan username" name="username" id="username" class="form-control">
         <label for="username" class="mt-3">Password</label>
         <input type="password" placeholder="Masukkan password" name="password" id="password" class="form-control">
         <div class="d-flex justify-content-between ">
            <span class="mt-4">Sudah punya akun ? <a href="login.php" class="text-warning"> Login</a></span>

            <button type="submit" name="submit" id="regis" class="btn btn-primary mt-4 px-5 py-2 rounded-pill">Register</button>
         </div>
      </div>

   </form>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

   <?php
   include 'db.php';


   if (isset($_POST['submit'])) {

      $nama = $_POST['nama'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      // jika data kosong
      // var_dump($username == '');
      if ($username == '' || $password == '' || $nama == '') {
         echo "
         <script>
         console.log(false);
         Swal.fire({
            title: 'Gagal Register',
            text: 'Silahkan cek form anda',
            icon: 'error'
         });
         </script>
      ";
      } else {
         mysqli_query($conn, "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')");

         $result = mysqli_affected_rows($conn);


         // jika sukses query
         if ($result > 0) {
            session_start();
            $_SESSION['sukses_regis'] = true;
            echo "
         <script>
         // alert('Sukses Register');
         location.href = 'login.php';
         </script>
         ";
         } else {
            session_start();
            $_SESSION['sukses_regis'] = false;
            echo "
         <script>
         // alert('gagal Register');
         location.href = 'register.php';
         </script>
         ";
         }
      }
   }


   ?>

</body>

</html>