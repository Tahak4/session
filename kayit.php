<?php
require 'ayarlar.php';

if(isset($_POST["submit"])){
    $ad = $_POST["ad"];
    $kullanici_adi = $_POST["kullanici_adi"];
    $email = $_POST["email"];
    $sifre = $_POST["sifre"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_kulanici WHERE kullanici_adi = '$kullanici_adi' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('kullanıcı adı veya e-posta zaten alınmış'); </script>";
    }      
else{
    if($sifre == $confirmpassword){
        $query = "INSERT tb_kulanici VALUES ('' ,'$ad','$kullanici_adi','$email','$sifre')";
        mysqli_query($conn,$query);
        header("Location: giris.php");
        echo
        "<script> alert('Kayıt başarılı'); </script>";
     }
    else{
        echo
        "<script> alert('şifre eşleşmiyor'); </script>";

    }
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
    <form class="login-from" action="" method="post" autocomplete="off">
    <h1>KAYIT</h1>

        <label  for="ad"></label>
        <input  class="tpbox" type="text" name="ad" id = "ad" required value="" placeholder="AD">

        <label  for="kullanici_adi"></label>
        <input  class="tpbox" type="text" name="kullanici_adi" id = "kullanici_adi" required value=""placeholder="KULLANICI ADI">

        <label  for="email"></label>
        <input  class="tpbox" type="email" name="email" id = "email" required value="" placeholder="EMAİL">

        <label  for="sifre"></label>
        <input  class="tpbox" type="password" name="sifre" id = "sifre" required value="" placeholder="ŞİFRE">

        <label for="confirmpassword"></label>
        <input class="tpbox" type="password" name="confirmpassword" id = "confirmpassword" required value="" placeholder="ŞİFRE ONAY"> 
        <button class="btn" type="submit" name="submit">KAYIT OL</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body> 
</html>