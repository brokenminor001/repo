<?php
include "pgconnect.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{



 $query = mysqli_query($link,"SELECT * FROM users WHERE id = '".$_COOKIE['id']."' LIMIT 1");

    $userdata = mysqli_fetch_assoc($query);
 if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))

{
setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");


        print "Хм, что-то не получилось";

}
else
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
  print "Добро пожаловать, ".$userdata['login'].". Доступные курсы:";

}
else
{
 header("Location: http://130.61.60.226/login5.php");
}




$query=mysqli_query($link,"select * from videoavail where student_id='2' and aval='1'");



while($all_video=mysqli_fetch_array($query))





{






?>
<script type="text/javascript" src=" https://code.jquery.com/jquery-1.11.2.js "></script>
<br>
<br>
<br>

<video id="myVideo" width="320" height="176" controls>
  <source src="uploads/1/<?php echo $all_video['videoname'];?>" type="video/mp4">
</video>
<script>
var vid = document.getElementById("myVideo");
vid.onended = function() {
    $.ajax({
    type: "GET",
    url: 'videopost.php',
    success: function(data){
        alert(data);
location.reload();
    }
})




};

</script>




 <?php
echo "<br>";
echo $all_video['videoname'];


 }


 ?>







<!DOCTYPE html>


<link rel="stylesheet" type="text/css" href="style2.css">
<div class="navbar" id="myNavbar">
  <a href="#home">Мои курсы</a>
  <a href="#news">Настройки</a>
  <a href="#contact">Контакты</a>
  <a href="#about">Профиль</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<body>



</body>
</html>
