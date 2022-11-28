<?php 
    require_once 'include/database.php'; 

    session_start();
    // $_SESSION['admin'];
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
                if(isset($_POST['AddCollection'])){
                    $nameC = $_POST['nameC'];
                    $nameA = $_POST['nameA'];
                    
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
                    $idUser = $_SESSION['admin']['idAdmin'];
                    // echo $idUser;

                    $imgA = "";
                    if(isset($_FILES['imageA'])){
                        $imgA = $_FILES['imageA']['name'];
                        $filenameA = uniqid().$imgA;
                        move_uploaded_file($_FILES['imageA']['tmp_name'], 'upload/collectionimg/' .$filenameA);
                    
                    }
                    else{
                        echo 'image makinach ';
                    }

                    $imgC = "";
                    if(isset($_FILES['imageC'])){
                        $imgC = $_FILES['imageC']['name'];
                        $filenameC = uniqid().$imgC;
                        move_uploaded_file($_FILES['imageC']['tmp_name'], 'upload/collectionimg/' .$filenameC);
                    
                    }
                    else{
                        echo 'image makinach ';
                    }

                    if(!empty($nameC) && !empty($nameA)){

                        $sqlState = $db->prepare("INSERT INTO collection VALUES(null, ?,?,?,?,?,?)");
                        $inserted = $sqlState->execute([$nameC,$nameA,$filenameA,$filenameC,null,$idUser]);
    
                        if($inserted){
                            echo 'naadi';
                        }
                        else{
                            echo 'awdiii';
                        }
                    }else{
                        echo 'empty !!!!';
                    }

                }

                
           ?>

            <!-- login -->
            <form method="post" id="login" class="input-groupe" enctype="multipart/form-data">
                <h2 class="Admin-title">Admin Login</h2>
                <input type="text" class="input-formin" placeholder="name collection" name="nameC">
                <input type="file" class="file-form" name="imageC">
                <input type="text" class="input-formin" placeholder="name artist" name="nameA">
                <input type="file" class="file-form" name="imageA">
                <br><br><br>
                <button type="submit" class="submit-btnn" name="AddCollection">Add</button>
            </form>
        </div>
    </div>
    <!--=============== MAIN JS ===============-->
    <script src="js/main.js"></script>
</body>
</html>