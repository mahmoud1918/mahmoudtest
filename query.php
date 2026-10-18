

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <title>مشكاة المنار</title>
    <link rel="shortcut icon" href="LOGO1.png" type="image/x-icon">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=0.9" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!--  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&ampdisplay=swap" rel="stylesheet">-->
    <!--Stylesheet-->
    <style media="screen">
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap');

    @font-face {

        src: url(/Amiri-Regular.ttf);
  font-family: "Tajawal", sans-serif;|
    }
            @font-face {
            font-family: 'Amiri-Bold';
            src: url('Amiri-Bold.ttf') format('truetype');
            font-weight: bold;
        }
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    font-family: "Tajawal", sans-serif;|
    background-color: #a8a7a1;
}
.background{
    width: 430px;
    height: 920px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    color: #a8a7a1;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}

form{
    height: 900px;
    width: 400px;
    background-color: #F5EFE1;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 10px 10px 10px #242322b4;
    padding: 50px 35px;

}
form *{
  font-family: "Tajawal", sans-serif;|
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;

}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: #d7ccb5;
    color: #2F2F2F;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
     font-family: "Tajawal", sans-serif;|
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    display: block;
    height: 50px;
    width: 100%;
    background-color: #d7ccb5;
    color: #2F2F2F;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-family: "Tajawal", sans-serif;|
    font-size: 17px;
    font-weight: bold;
    border-radius: 1rem;
    box-shadow: 3px 3px 3px #242322b4;

}
a {
color: #2f2f2f;

}
a.button{
    display: block;
    height: 60px;
    width: 88%;
    background-color: #d7ccb5;
    color: #2F2F2F;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-family: "Tajawal", sans-serif;|
    font-size: 17px;
    font-weight: bold;
    border-radius: 1rem;
      text-align: center;
    box-shadow: 3px 3px 3px #242322b4;

}
.social{
  margin-top: 30px;
  display: flex;
}
.p{
    font-size: 17px;

}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
.center1{
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.icon {
        font-size: 2em;
      }

      ::placeholder { 
  color: #2f2f2f;
}


    </style>
</head>
<body bgcolor=#a8a7a1>
    <div class="background">
    </div>
        <br>
        <br>
    <form method="POST">
<center>
<img src="ثانوية مشكاة المنار (400 × 120 px) (1).png">
</center>

<font color="000000"><label for="stid">:National iD</label></font>
        <input type="number" placeholder="رقم الهوية :" name="stid" value="<?php echo $id;?>">
        <br>
        <input type="submit" name="submit" value="بحث">
        
<?php

if (isset($_POST['submit'])) {
    $stid = $_POST['stid'];
    $servername = "sql200.infinityfree.com";
    $username = "if0_36620543";
    $password = "6szaqpPzAur";
    $dbname = "if0_36620543_stid";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, "SET CHARACTER SET utf8");

    $stid = mysqli_real_escape_string($con, $stid);

    $query = "SELECT * FROM `hello` WHERE `StId` = '$stid'";
    $queryinject = mysqli_query($con, $query);

    if ($queryinject) {
        if (mysqli_num_rows($queryinject) > 0) {
            $row = mysqli_fetch_assoc($queryinject); 
                      $timess = $row['times'];
            $times = $timess + 1;
            $updateQuery = "UPDATE `hello` SET `times`='$times' WHERE `StId`='$stid'";
            mysqli_query($con, $updateQuery);
        }
}
else{
  echo "<center><p><b><font color='#f70505'>!No Recordes</font></b></p></center>";
  die();
};
                
}
?>
<font color="#141414">
<p><b>
    <br>

الأسم :<font color="#ad0202">
 <?php $namee = $row['StNa']; echo $row['StNa'];?>
 </font>

<br><br>

رقم اللجنة : <font color="#ad0202">

<?php echo $row['Com'];?>
    </font>

<br>
<br>
رقم الجلوس : <font color="#ad0202">

<?php echo $row['SetNo'];?>
    </font>
    
    <br>
<br>
مقر اللجنة : <font color="#ad0202">

<?php echo $row['Loc'];?>
    </font>
</font>
<br><br>
<font color="#141414">
    <center>
    "اللَّهُمَّ لا سَهْلَ إِلاَّ ما جَعَلْتَهُ سَهْلاً، وأنْتَ تَجْعَلُ الحَزْنَ إذَا شِئْتَ سَهْلاً".
</font>
<br>

<font color="#f54242">

    عزيزي الطالب<br>
لاتتردد في طلب الموجه الطلابي عند الحاجه إليه    </center>
    </font>
    
    <br>

<font color="#1e81b0">
مكان الجلوس:
<?php 
if (preg_match('/\d/', $row["Com"])) {
    echo '<a href="/pdf/'.$row["Com"].'.pdf" target="_blank" style="color: #1e81b0;" class="button" ><br> انقر هُنا لمعرفة مكان جلوسك داخل اللجنة</a>';
} else {
    // Invalid - 

}

    




?>
<br>
جدول الإختبارات : 

<?php 
$setno = $row['SetNo'];
$onest = "1114";
$twost = "1216";
$threest = "1316";
if (preg_match("/$onest/", $setno)){    
echo '<a href="pdf/1st.pdf" target="_blank" style="color: #1e81b0;" class="button" ><br>     جدول إختبارات المرحلة</a>';
}
else{
if (preg_match("/$twost/", $setno)){    
echo '<a href="pdf/2nd.pdf" target="_blank" style="color: #1e81b0;" class="button" ><br>     جدول إختبارات المرحلة</a>';
}
else{
if (preg_match("/$threest/", $setno)){    
echo '<a href="pdf/3rd.pdf" target="_blank" style="color: #1e81b0;" class="button" ><br>     جدول إختبارات المرحلة</a>';
}
}
}
?>


<font color="#1e81b0">
    <center>
        <br>
<?php
$file = '1visitors.txt'; 
$newContent = $namee."\n";
file_put_contents($file, $newContent, FILE_APPEND);
?>
                <br>
                </center>
           <!--     <a href="https://mishkatschools.com/services" class="return-link">&#8592; العودة</a>-->

</font>
</b></p>
</div></div>
        </form>
                                <center><br><br><br>
</center>


</body>
</html>
