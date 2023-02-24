<?php
require 'ayarlar.php';

if(isset($_POST["submit"])){
    $kullanici_adiemail = $_POST["kullanici_adiemail"];
    $sifre = $_POST["sifre"];
    $result = mysqli_query($conn, "SELECT * FROM tb_kulanici WHERE kullanici_adi = '$kullanici_adiemail' OR email = '$kullanici_adiemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($sifre == $row["sifre"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
        echo
        "<script> alert('yanlış şifre'); </script>";
        }

    }
    else{
        echo
        "<script> alert('kullancı kayıtlı değil'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/min.css">

</head>
<body>

<div>
    <form class="login-from" action="" method="post" aoutcomplete="off">
        <h1>GİRİŞ</h1>
        <label for="kullanici_adiemail"></label>
        <input  class="tpbox" type="text" name="kullanici_adiemail" id="kullanici_adiemail" required value="" placeholder="KULLANICI ADI VEYA EMAİL">
        <label  for="sifre"></label>
        <input  class="tpbox" type="password" name="sifre" id="sifre" required value="" placeholder="ŞİFRE">
        <button class="btn" type="submit" name="submit">GİRİŞ</button>
        <a class="btn" href="kayit.php">KAYIT</a>
    </form>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>