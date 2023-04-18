<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'style.css'; ?>
    </style>
    <title>Document</title>
</head>

<body>
    <?php
    require_once "./db.php";

    //функция проверки на заполненность полей       
    function one_of_is_empty($arr)
    {
        unset($arr['submit']);
        foreach ($arr as $key => $value) {
            if (trim($value) === '') return true;
        }
    }


    if (isset($_POST['submit'])) {

        if (one_of_is_empty($_POST)) {
            echo "<h1 style='color : red';>put data in all fields</h1>";
        } else {

            $user_job = trim($_POST['jobtitle']);
            $user_name = trim($_POST['username']);
            $mail = trim($_POST['email']);
            $password = trim($_POST['password']);


            $sql_get_mail = "SELECT * FROM user_data WHERE mail='$mail'";
            $all_mail = $mysql->query($sql_get_mail);
            if ($all_mail->num_rows > 0) {
                echo "<h1 style='color : red';>there is an acc with this mail</h1>";
            } else {
                $sql_insert = "INSERT INTO user_data (`job`, `name`, `mail`, `password`) 
                VALUES ('$user_job', '$user_name', '$mail', '$password')";
                $mysql->query($sql_insert);
                header('Location: ./login.php');
            }
        }
    }
    ?>

    <a class="reg_and_log" href="./login.php">войти</a>
    <form class="form" action="" method="post">

        <label for="selector">choose job title</label>
        <select id="selector" name="jobtitle">
            <option value="frontend">frontend</option>
            <option value="backend">backend</option>
            <option value="fullstack">fullstack</option>
        </select>

        <label for="user-name">put your username</label>
        <input id="user-name" type="text" name="username" value="<?php echo $user_name ?>">

        <label for="user-mail">put your mail</label>
        <input id="user-mail" type="email" name="email" value="<?php echo $mail ?>">

        <label for="user-password">and your password</label>
        <input id="user-password" type="password" name="password" value="<?php echo $password ?>">

        <input class="btn" type="submit" name="submit" value="submit">


    </form>


</body>

</html>