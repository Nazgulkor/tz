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
    if (isset($_POST['submit'])) {
        $mail = $_POST['mail'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM user_data WHERE (`mail` = '$mail') AND (`password` = '$pass')";
        $result =  $mysql->query($sql);
        if($result->num_rows === 0) {
            echo "<h1 style='color : red;''>wrong mail or pass</h1>";
        }else {
            header('Location: ./success.html');
        }
    }
    ?>
    <a class="reg_and_log" href="./index.php">регистрация</a>

    <h1 style="text-align: center;">ввойди в свой акк</h1>
    <form action="" method="post">
        username
        <input type="email" name="mail">
        password
        <input type="password" name="password">
        <input type="submit" name="submit">
    </form>
</body>

</html>