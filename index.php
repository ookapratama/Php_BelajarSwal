<?php
session_start();
if ($_SESSION == null) {
   header("Location: login.php");
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
   <h1 class="m-3">Hello, <?= $_SESSION['nama'] ?></h1>
   <p class="m-3">Silahkan <a href="logout.php">logout</a></p>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

   <?php
   // var_dump($_SESSION['sukses_regis']);
   if (isset($_SESSION['sukses_login'])) { ?>
      <script>
         Swal.fire({
            title: 'Sukses Login',
            text: 'Selamat Datang di Dashboard',
            icon: 'success'
         });
      </script>
   <?php }  ?>

</body>

</html>