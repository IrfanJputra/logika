<?php
session_start();
$_SESSION ['halaman']='index.php';
if( !isset($_SESSION["level"]) ) {
	header("Location: login.php");
	exit;
}
?>

<?php 
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM tb_pegawai");
$no=1;
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
    <title>Profil</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="assets/dist/css/app.css" />
    <!-- END: CSS Assets-->
  </head>
  <!-- END: Head -->
  <body class="py-5" onload="getLocation();">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
      <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
          <img alt="Midone - HTML Admin Template" class="w-6" src="assets/dist/images/logo.svg">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler">
          <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
      </div>
      <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler">
          <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
        <ul class="scrollable__content py-2">
          <li>
            <a href="javascript:;" class="menu">
              <div class="menu__icon">
                <i data-lucide="home"></i>
              </div>
              <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon "></i>
              </div>
            </a>
          </li>
          <li class="menu__devider my-6"></li>
          <li>
            <a href="javascript:;" class="menu">
              <div class="menu__icon">
                <i data-lucide="edit"></i>
              </div>
              <div class="menu__title"> Data Profil <i data-lucide="chevron-down" class="menu__sub-icon "></i>
              </div>
            </a>
          </li>
          <li>
            <a href="logout.php" class="menu menu--active">
              <div class="menu__icon">
                <i data-lucide="trello"></i>
              </div>
              <div class="menu__title"> Logout <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i>
              </div>
            </a>
          </li>
        </ul>
        </li>
        </ul>
      </div>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex mt-[4.7rem] md:mt-0">
      <!-- BEGIN: Side Menu -->
      <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
          <img alt="Midone - HTML Admin Template" class="w-6" src="assets/dist/images/logo.svg">
          <span class="hidden xl:block text-white text-lg ml-3"> Rubick </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
          <li>
            <a href="javascript:;.html" class="side-menu side-menu--active">
              <div class="side-menu__icon">
                <i data-lucide="trello"></i>
              </div>
              <div class="side-menu__title"> Data Pegawai </div>
            </a>
            <ul class="side-menu__sub-open"></ul>
          </li>
          <li>
            <a href="add_user.php" class="side-menu">
              <div class="side-menu__icon">
                <i data-lucide="user"></i>
              </div>
              <div class="side-menu__title"> User </div>
            </a>
          </li>
          <li class="side-nav__devider my-6"></li>
          <li>
            <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon">
                <i data-lucide="key"></i>
              </div>
              <div class="side-menu__title"> Setting </div>
            </a>
          </li>
          <li>
            <a href="logout.php" class="side-menu">
              <div class="side-menu__icon">
                <i data-lucide="power"></i>
              </div>
              <div class="side-menu__title"> Log Out </div>
            </a>
          </li>
        </ul>
      </nav>
      <!-- END: Side Menu -->
      <!-- BEGIN: Content -->
      <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
          <!-- BEGIN: Breadcrumb -->
          <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="#">Application</a></li><li class="breadcrumb-item active" aria-current="page">Dashboard</li> -->
            </ol>
          </nav>
          <!-- END: Breadcrumb -->
          <!-- BEGIN: Notifications -->
          <div class="intro-x dropdown mr-auto sm:mr-6">
            <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown">
              <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
            </div>
            <div class="notification-content pt-2 dropdown-menu">
              <div class="notification-content__box dropdown-content">
                <div class="notification-content__title">Notifications</div>
                <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                      <a href="javascript:;" class="font-medium truncate mr-5">Kate Winslet</a>
                      <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                    </div>
                    <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END: Notifications -->
          <!-- BEGIN: Account Menu -->
          <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
              <img alt="Midone - HTML Admin Template" src="dist/images/profile-1.jpg">
            </div>
            <div class="dropdown-menu w-56">
              <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                  <div class="font-medium">Nicolas Cage</div>
                  <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Software Engineer</div>
                </li>
                <li>
                  <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                  <a href="" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                </li>
                <li>
                  <a href="" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                </li>
                <li>
                  <a href="" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                </li>
                <li>
                  <a href="" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                </li>
                <li>
                  <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                  <a href="" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        <div class="intro-y flex items-center mt-8">
          <h2 class="text-lg font-medium mr-auto"> Selamat Datang </h2>
        </div>
        <div class="tab-content mt-5">
          <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">

              <!-- BEGIN: Data List -->
              <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">N0</th>
                                    <th class="whitespace-nowrap">NAMA</th>
                                    <th class="whitespace-nowrap">ALAMAT</th>
                                    <th class="text-center whitespace-nowrap">FOTO</th>
                                    <th class="text-center whitespace-nowrap">AKSI</th>
                                </tr>
                            </thead>


                            <tbody>
                              <?php
                            $no = 1;
                            $data = mysqli_query($conn, "SELECT * FROM tb_pegawai");
                            while ($row = mysqli_fetch_assoc($data)) {
                              ?>
                              <tr class="intro-x">
                                  <td class="w-40"> <?= $no++?></td>
                                  <td class="w-40"> <?= $row['nama']?></td>
                                    <td class="w-40"> <?= $row['alamat'] ?></td>
                                    <td class="w-40"> <?= $row['foto'] ?></td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="admin/edit.php?id=<?=$row['id_pegawai']?>"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-danger" href="admin/del.php?id=<?php echo $row['id_pegawai'];?>"onclick="return confirm('yakin?');"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                            ?>

                              
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->
            </div>
          </div>
        </div>
      </div>
      <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="#" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
      <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
      <div class="dark-mode-switcher__toggle border"></div>
    </div>
    <!-- END: Dark Mode Switcher-->
    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="assets/dist/js/app.js"></script>
    <!-- END: JS Assets-->
  </body>
</html>