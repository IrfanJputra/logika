<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM tb_login WHERE username = '$username'");
    // $data = mysqli_fetch_assoc($result);
    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if ($row["level"] == 'Admin') {
            // set session
            // $_SESSION["login"] = true;
            $_SESSION['username'] = $username;
            $_SESSION["level"] = 'Admin';
            sleep(2);
            echo "
            <script>
              document.location.href = 'index.php';
            </script>
          ";
            exit;
        } else if ($row["level"] == 'User') {
            // set session
            // $_SESSION["login"] = true;
            $id = $row['id_pegawai'];
            $_SESSION['username'] = $username;
            $_SESSION['id_pegawai'] = $id;
            $_SESSION["level"] = 'User';
            sleep(2);
            echo "<script>
            document.location.href = 'absen.php';
            </script>"; 
        }
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en" class="light">
  <!-- BEGIN: Head -->
  <head>
    <meta charset="utf-8">
    <link href="assets/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"

integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="assets/dist/css/app.css" />
    <!-- END: CSS Assets-->
  </head>
  <!-- END: Head -->
  <body class="login">
    <div class="container sm:px-10">
      <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
          <a href="" class="-intro-x flex items-center pt-5">
            <img alt="Midone - HTML Admin Template" class="w-6" src="assets/dist/images/logo.svg">
            <span class="text-white text-lg ml-3"> Rubick </span>
          </a>
          <div class="my-auto">
            <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="assets/dist/images/illustration.svg">
            <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10"> A few more clicks to <br> sign in to your account. </div>
            <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your e-commerce accounts in one place</div>
          </div>
        </div>
        <!-- END: Login Info -->
          <!-- BEGIN: Login Form -->
          <form action="" method="POST">
          <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
              <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign In</h2>
              <?php if( isset($error) ) : ?>
	                    <p style="color: red; font-style: italic;">Username / Password Salah</p>
                        <?php endif; ?>
              <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
              <div class="intro-x mt-8">
                <input type="text" class="intro-x login__input form-control py-3 px-4 block" name="username" placeholder="Username">
                <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" name="password" placeholder="Password">
              </div>
              <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                <div class="flex items-center mr-auto">
                  <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                  <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                </div>
                <!-- <a href="">Forgot Password?</a> -->
              </div>
              <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit" name="login" onclick="simpan()" >Login</button>
                <!-- <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> -->
              </div>
              <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a>
              </div>
            </div>
          </div>
        </form>
        <!-- END: Login Form -->
      </div>
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="#" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
      <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
      <div class="dark-mode-switcher__toggle border"></div>
    </div>
    <!-- END: Dark Mode Switcher-->
    <!-- BEGIN: JS Assets-->
    <script src="assets/dist/js/app.js"></script>
    <!-- END: JS Assets-->
    <script type="text/javascript">
function simpan() {

   swal({

        title: "Berhasil!",

        text: "Anda Berahasil Login",

        icon: "success",

        button: true

    });

}
</script>
  </body>
</html>