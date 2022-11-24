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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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

            <?php
                if(isset($_POST['loginAdmin'])){
                    $login = $_POST['email'];
                    $pass = $_POST['pass'];

                    if(!empty($login) && !empty($pass)){
                        require_once 'include/database.php';

                        $sqlState = $db->prepare('SELECT * FROM xadmin where email = ? AND pass = ?');
                        $sqlState->execute([$login,$pass]);

                        if($sqlState->rowCount() >= 1){
                            
                            session_start();
                            $_SESSION['admin'] = $sqlState->fetch();
                            header('location: admin.php');
                            

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

            <!-- login -->
            <form method="post" id="login" class="input-groupe">
                <h2 class="Admin-title">Admin Login</h2>
                <input type="text" class="input-formin" placeholder="email" name="email">
                <input type="text" class="input-formin" placeholder="password" name="pass"><br><br><br>
                <button type="submit" class="submit-btnn" name="loginAdmin">Login</button>
            </form>
        </div>
    </div>
    <!--=============== MAIN JS ===============-->
    <script src="js/main.js"></script>
</body>
</html>