<?php
require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


	// cek apakah data berhasil di tambahkan atau tidak
	if (absen($_POST) > 0) {

    sleep(2);
		echo "
			<script>
				document.location.href = 'absen.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Gagal Absen!');
				document.location.href = 'absen.php';
			</script>
		";
	}
}
?>

<?php
session_start();
$_SESSION['halaman'] = 'index.php';
if (!isset($_SESSION["level"])) {
	header("Location: login.php");
	exit;
}

// Fungsi untuk menyimpan waktu terakhir tombol absen ditekan
function setLastAbsenTime()
{
	$_SESSION['last_absen_time'] = time();
}

// Fungsi untuk memeriksa apakah tombol absen harus muncul atau tidak
function isAbsenButtonVisible()
{
	if (!isset($_SESSION['last_absen_time'])) {
		// Jika belum pernah ditekan sebelumnya, tampilkan tombol absen
		return true;
	}

	$lastAbsenTime = $_SESSION['last_absen_time'];
	$currentTime = time();
	$elapsedTime = $currentTime - $lastAbsenTime;

	// Jika sudah lebih dari 1 jam (3600 detik), tampilkan tombol absen
	if ($elapsedTime >= 60) {
		return true;
	}

	// Jika belum 1 jam, tombol absen tetap disembunyikan
	return false;
}

// Cek apakah tombol absen ditekan
if (isset($_POST['submit'])) {
	// Tombol absen ditekan, simpan waktu terakhir tombol absen ditekan
	setLastAbsenTime();
}

?>

<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>latihan</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php
$result = mysqli_query($conn, "SELECT * FROM tb_login WHERE id_pegawai");
$data = mysqli_fetch_assoc($result);
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
              <div class="menu__title"> Crud <i data-lucide="chevron-down" class="menu__sub-icon "></i>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;" class="menu">
              <div class="menu__icon">
                <i data-lucide="users"></i>
              </div>
              <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon "></i>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;.html" class="menu menu--active">
              <div class="menu__icon">
                <i data-lucide="trello"></i>
              </div>
              <div class="menu__title"> Profile <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i>
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
            <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon">
                <i data-lucide="layout"></i>
              </div>
              <div class="side-menu__title"> Pages </div>
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
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box px-5 pt-5 mt-5">
          <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
              <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img alt="Midone - HTML Admin Template" class="rounded-full" src="assets/dist/images/profile-9.jpg">
              </div>
              <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"><?= $_SESSION['username'] ?></div>
                <div class="text-slate-500">Frontend Engineer</div>
              </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
              <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
              <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                <div class="truncate sm:whitespace-normal flex items-center">
                  <i data-lucide="mail" class="w-4 h-4 mr-2"></i> denzelwashington@left4code.com
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3">
                  <i data-lucide="instagram" class="w-4 h-4 mr-2"></i> Instagram Denzel Washington
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3">
                  <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter Denzel Washington
                </div>
              </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
			<?php if (isAbsenButtonVisible()) : ?>
		<form class="myForm" action="" method="post" autocomplete="off">
			<input type="hidden" name="nama" value="<?= $_SESSION['id_pegawai'] ?>">
			<input type="hidden" name="tanggal" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
																		echo date('d-m-Y H:i:s'); ?>">
			<input type="hidden" name="status" id="status" value="Sudah">
			<input type="hidden" name="latitude" value="">
			<input type="hidden" name="longitude" value="">
			<button class="btn btn-rounded-primary w-24 mr-1 mb-2" type="submit" name="submit" onclick="simpan()">Absen</button> 
		</form>
	<?php else : ?>
		<div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">Anda Sudah Absen</div>
	<?php endif; ?>

            </div>
          </div>
        </div>
        <!-- END: Profile Info -->
        <div class="tab-content mt-5">
          <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">

              <!-- BEGIN: Data List -->
              <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">TANGGAL</th>
                                    <th class="whitespace-nowrap">PUKUL</th>
                                    <th class="text-center whitespace-nowrap">MAPS</th>
                                    <th class="text-center whitespace-nowrap">STATUS</th>
                                </tr>
                            </thead>


                            <tbody>
                              <?php
                            $no = 1;
                            $data = mysqli_query($conn, "SELECT * FROM tb_absen WHERE id_pegawai= '$_SESSION[id_pegawai]' ORDER BY tanggal DESC LIMIT 1 ");
                            while ($row = mysqli_fetch_assoc($data)) {
                              $tanggal_db= $row['tanggal'];
                              $tgl = date("d M Y", strtotime($tanggal_db));
                              $jam = date("h:i:s", strtotime($tanggal_db));
                              ?>
                              <tr class="intro-x">
                                  <td class="w-40"> <?= $tgl?></td>
                                    <td class="w-40"> <?= $jam ?></td>
                                    <td class="text-center"style="width: 200px; height: 150px;"><iframe src="https://www.google.com/maps?q=<?= $row['latitude']; ?>,<?= $row['longitude']; ?>&hl=es;z=14&output=embed" frameborder="0"></iframe></td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Sudah </div>
                                    </td>
                                    <!-- <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        </div>
                                    </td> -->
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
	<script type="text/javascript">
		function getLocation() {

			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition, showError);
			}
		}

		function showPosition(position) {
			document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
			document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
		}

		function showError(error) {
			switch (error.code) {
				case error.PERMISSION_DENIED:
					alert("Aktifkan Lokasi");
					location.reload();
					break;
			}
		}
	</script>

<script type="text/javascript">
function simpan() {

   swal({

        title: "Berhasil!",

        text: "Anda Berahasil Absen",

        icon: "success",

        button: true

    });

}
</script>
  </body>
</html>