<?php 
    require_once 'include/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .Admin-title{
            color:#eee;
        }
        .input-formin{
        width: 100%;
        padding: 10px 0;
        margin: 5px 0;
        border-left: 0;
        border-right: 0;
        border-top: 0;
        border-bottom: 1px solid #999;
        outline: none;
        background: transparent;
        color: #eee;
        }
    </style>
</head>
<body>
    <div class="hero">
        
    <div class="form-box">

            <div class="button-box">
                <div id="btn"></div>
                <button class="toggle-btn" onclick="login()">Login</button>
                <button class="toggle-btn" onclick="register()">Register</button>
            </div>


            <!-- login -->
            <?php
                if(isset($_POST['login'])){
                    $login = $_POST['email'];
                    $pass = $_POST['pass'];

                    if(!empty($login) && !empty($pass)){
                        // require_once 'include/database.php';

                        $sqlState = $db->prepare('SELECT * FROM user where email = ? AND password = ?');
                        $sqlState->execute([$login,$pass]);

                        if($sqlState->rowCount() >= 1){

                            session_start();
                            $_SESSION['user_session'] = $sqlState->fetch();
                            header('location: index.php');
}else{
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    Login , password incorrectes
                                </div>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Login , password sont obligatoirse
                            </div>
                        <?php
                    }
                }
            ?>
            <form method="post" id="login" class="input-group">
                <input type="email" class="input-formin" placeholder="email" name="email" require>
                <input type="text" class="input-formin" placeholder="password" name="pass"><br><br><br>
                <button type="submit" class="submit-btnn" name="login">Login</button>
            </form>
<!-- register -->
            <?php
                if(isset($_POST['Rrgister'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];


                    if(empty($checkArt) && empty($image)){
                        $checkArt = null;
                        $filename = null;
                    }else{
                        $image = $_FILES['image']['name'];
                        $filename = uniqid().$image;
                        move_uploaded_file($_FILES['image']['tmp_name'], 'upload/user/'.$filename);
                    }

                }


                if(!empty($name) && !empty($email) && !empty($pass)){

                    $sqlState = $db->prepare('INSERT INTO user VALUES(null, ?,?,?)');
                    $inserted = $sqlState->execute([$email,$pass,$name]);

                    if($inserted){
                        echo '';
                    }
                    else{
                        echo 'error';
                    }
                }
            ?>

            <form method="post" id="register" class="input-group" enctype="multipart/form-data">
                <input type="text" class="input-formin" placeholder="name" name="name">
                <input type="email" class="input-formin" placeholder="email" name="email" >
                <input type="text" class="input-formin" placeholder="password" name="pass">
                <br><br>

                <button type="submit" class="submit-btnn" name="Rrgister">Register</button>
            </form>
        </div>


        
    </div>

    <script>
        let L = document.getElementById("login");
        let R = document.getElementById("register");
        let B = document.getElementById("btn");

        function register(){
            L.style.left = "-400px";
            R.style.left = "50px";
            B.style.left = "115px";

        }

        function login(){
            L.style.left = "50px";
            R.style.left = "450px";
            B.style.left = "0";

        }
    </script>

    <!--=============== MAIN JS ===============-->
    <script src="js/main.js"></script>
</body>
</html>