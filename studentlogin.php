<?php
include "pgconnect.php";



function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];
    }

    return $code;

}

  $query = mysqli_query($link,"SELECT id, password FROM users WHERE login='".$_POST['login']."' LIMIT 1");

$data = mysqli_fetch_assoc($query);

echo $data['password'];


if($data['password'] === md5(md5($_POST['password'])))

    {

        # Генерируем случайное число и шифруем его

        $hash = md5(generateCode(10));



        mysqli_query($link, "UPDATE users SET hash='".$hash."' WHERE id='".$data['id']."'");



        # Ставим куки

        setcookie("id", $data['id'], time()+60*60*24*30);

        setcookie("hash", $hash, time()+60*60*24*30);



        # Переадресовываем браузер на страницу проверки нашего скрипта

        header("Location: test.php"); exit();

    }

    else

    {

        print "Вы ввели неправильный логин/пароль";

    }
?>

<link rel="stylesheet" type="text/css" href="stylelogin.css">

<form method="POST">



  <div class="action_form">
Логин <input name="login" type="text"><br>

Пароль <input name="password" type="password"><br>

<input name="submit" type="submit" value="Войти">

</div>
