<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #body{
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body id="body">
    <td>   <input class="btn btn-danger" type="reset" value="Reset"> 
    <?php
$data = 10;

if ($data <10){
echo '<a class="btn btn-primary" href="#" role="button">Tambah</a>';
}
else{
    echo '<a class="btn btn-light"  role="button" readonly>Tambah</a>';
}
?>
</td>
</body>
</html>