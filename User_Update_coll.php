<?php 
    require_once 'include/database.php'; 

    // session_start();
    // $_SESSION['user_session'];
    session_start();
    if(isset($_SESSION['user_session'])){ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="">
        <div class="box">
        <?php
                if(isset($_POST['btn'])){
                    $nameC = $_POST['nameC'];
                    $nameA = $_POST['nameA'];

                    // session_start();
                    $idUser = $_SESSION['user_session']['idL'];

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
                        $inserted = $sqlState->execute([$nameC,$nameA,$filenameA,$filenameC,$idUser,null]);
    
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

            <input type="text" name="nameC" class="inpttxt" placeholder="name collection">
            <input type="file" name="imageC" class="inptfile" >
            <input type="text" name="nameA" class="inpttxt" placeholder="name collection">
            <input type="file" name="imageA" class="inptfile">

            <input type="submit" class="btn" value="ADD">
        </div>
    </form>
</body>
</html>

<?php } else{
    header('location: login.php');
}

?>