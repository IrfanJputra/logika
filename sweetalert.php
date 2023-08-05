<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"

        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Contoh Penggunaan SweetAlert</title>

</head>

<body>

    <div class="container">

        <h1>Contoh Pop-up Alert Menggunakan SweetAlert</h1>

        <button class="btn btn-primary" onclick="simpan()">Klik disini</button>

    </div>

    <script type="text/javascript">

        function simpan() {

           swal({

                title: "Berhasil!",

                text: "Pop-up berhasil ditampilkan",

                icon: "success",

                button: true

            });

        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"

      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"

        crossorigin="anonymous"></script>

</body>

</html>