<?php

// Database configuration

$servername = "sql200.infinityfree.com";

$username = "if0_36620543";

$password = "6szaqpPzAur";

$database = "if0_36620543_stid";


// 

$conn = new mysqli($servername, $username, $password, $database);




if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}




    mysqli_query($conn, "SET NAMES 'utf8'");

    mysqli_query($conn, "SET CHARACTER SET utf8");



$id = ""; 

$userInfo = ""; 




if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $id = $_POST['stid'];




    if (!empty($id)) {


        $classQuery = "SELECT class FROM students_datas WHERE id = ?";

        $stmt = $conn->prepare($classQuery);

        $stmt->bind_param("s", $id);

        $stmt->execute();

        $classResult = $stmt->get_result();



        if ($classResult->num_rows > 0) {

            $classRow = $classResult->fetch_assoc();

            $class = $classRow['class'];



            $table = "";

            if ($class == 1) {

                $table = "st";

            } elseif ($class == 2) {

                $table = "nd";

            } elseif ($class == 3) {

                $table = "rd";

            } else {

                $userInfo = "Invalid class found in database!";

                exit;

            }




            $userQuery = "SELECT * FROM $table WHERE id = ?";

            $stmt = $conn->prepare($userQuery);

            $stmt->bind_param("s", $id);

            $stmt->execute();

            $userResult = $stmt->get_result();



            if ($userResult->num_rows > 0) {

                $userRow = $userResult->fetch_assoc();

                foreach ($userRow as $key => $value) {


                    $translatedKey = ($key === "id") ? "الهوية الوطنية" : htmlspecialchars($key);




                    $color = "";

                    if ($value === "ممتاز") {

                        $color = "green";

                    } elseif ($value === "جيد جدًا") {

                        $color = "blue";

                    } elseif ($value === "جيد") {

                        $color = "orange";

                    } elseif ($value === "يحتاج رعاية") {

                        $color = "red";

                    }



                    if ($color) {

                        $userInfo .= "<strong>" . htmlspecialchars($translatedKey) . ":</strong> <span style='color:$color;'>" . htmlspecialchars($value) . "</span><br><br>";

                    } else {

                        $userInfo .= "<strong>" . htmlspecialchars($translatedKey) . ":</strong> " . htmlspecialchars($value) . "<br><br>";

                    }

                }

            } else {

                $userInfo = "لم يتم العثور على أي سجل للطالب: $id.";

            }

        } else {

            $userInfo = "لم يتم العثور على الصف الخاص بهذا للطالب.";

        }

    } else {

        $userInfo = "الرجاء إدخال الهوية الوطنية.";

    }

}

?>



<!DOCTYPE html>

<html lang="en" dir="rtl">

<head>

    <title>مشكاة المنار</title>

    <link rel="shortcut icon" href="LOGO1.png" type="image/x-icon">  

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <meta name="viewport" content="width=device-width, initial-scale=0.9" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style media="screen">

        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap');

        @font-face {

            font-family: "Tajawal", sans-serif;

            src: url(/Amiri-Regular.ttf);

        }

        @font-face {

            font-family: 'Amiri-Bold';

            src: url('Amiri-Bold.ttf') format('truetype');

            font-weight: bold;

        }

        *, *:before, *:after {

            padding: 0;

            margin: 0;

            box-sizing: border-box;

        }

        body {

            font-family: "Tajawal", sans-serif;

            background-color: #a8a7a1;

        }

        form {

            height: 930px;

            width: 400px;

            background-color: #F5EFE1;

            position: absolute;

            transform: translate(-50%, -50%);

            top: 50%;

            left: 50%;

            border-radius: 10px;

            backdrop-filter: blur(10px);

            border: 2px solid rgba(255,255,255,0.1);

            box-shadow: 10px 10px 10px #242322b4;

            padding: 50px 35px;

        }

        form * {

            font-family: "Tajawal", sans-serif;

            letter-spacing: 0.5px;

            outline: none;

            border: none;

        }

        form h3 {

            font-size: 32px;

            font-weight: 500;

            line-height: 42px;

            text-align: center;

        }

        label {

            display: block;

            margin-top: 30px;

            font-size: 16px;

            font-weight: 500;

        }

        input {

            display: block;

            height: 50px;

            width: 100%;

            background-color: #d7ccb5;

            color: #2F2F2F;

            border-radius: 3px;

            padding: 0 10px;

            margin-top: 8px;

            font-size: 14px;

            font-weight: 300;

        }

        button {

            display: block;

            height: 50px;

            width: 100%;

            background-color: #d7ccb5;

            color: #2F2F2F;

            border-radius: 3px;

            padding: 0 10px;

            margin-top: 8px;

            font-size: 17px;

            font-weight: bold;

            border-radius: 1rem;

            box-shadow: 3px 3px 3px #242322b4;

        }

    </style>

</head>

<body>

    <form method="POST">

        <center>

            <img src="ثانوية مشكاة المنار (400 × 120 px) (1).png" alt="Logo">

        </center>

        <label for="stid">:National iD</label>

        <input type="number" placeholder="رقم الهوية :" name="stid" value="<?php echo htmlspecialchars($id); ?>">

        <button type="submit" name="submit">بحث</button>

        <br>

        <?php if (!empty($userInfo)) echo "" . $userInfo . ""; ?>

    </form>

</body>

</html>

