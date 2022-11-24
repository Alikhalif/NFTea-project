<?php require_once 'include/database.php';


    session_start();
    if(isset($_SESSION['user_session'])){ 
        
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

           
            <!-- login -->
            <?php
                if(isset($_POST['AddNft'])){
                    $nameN = $_POST['nameN'];
                    $descN = $_POST['descN'];
                    $priceN = $_POST['priceN'];
                    $colN = $_POST['colN'];

                    // session_start();
                    $idUser = $_SESSION['user_session']['idL'];

                    $imageN = $_FILES['imageN']['name'];
                    $filename = uniqid().$imageN;
                    move_uploaded_file($_FILES['imageN']['tmp_name'], 'upload/nft/'.$filename);

                    if(!empty($nameN) && !empty($descN) && !empty($priceN) && !empty($imageN) && !empty($colN)){
                        $sqlState = $db->prepare("INSERT INTO nfts VALUES(null,?,?,?,?,?,?,?)");
                        $sqlState->execute([$nameN,$descN,$priceN,$filename,$colN,null,$idUser]);
                    }else{
                        echo 'empty !!!!  ';
                    }
                }
            ?>
            
            <form method="post" id="login" class="input-groupe"  enctype="multipart/form-data">
                <h2 class="Admin-title">Admin Add NFT</h2>

                <input type="text" class="input-formin" placeholder="name nft" name="nameN">
                <textarea name="descN" id="" cols="30" rows="5"></textarea>
                <input type="number" class="input-formin" placeholder="price nft" name="priceN">
                <input type="file" class="file-form" name="imageN">

                <br><br>

                
                        <select name="colN" id="">
                            <option value="">select collection</option>
                            <?php
                                $collections = $db->query('SELECT * FROM collection')->fetchAll(PDO::FETCH_ASSOC);
                                foreach($collections as $collection){
                                ?>
                                    <option value="<?php echo $collection['idC'] ?>"><?php echo $collection['nomC'] ?></option>

                                <?php
                                }
                            ?>
                        </select>

                
                <br><br><br>
                <button type="submit" class="submit-btnn" name="AddNft">Add</button>
            </form>
        </div>
    </div>
    <!--=============== MAIN JS ===============-->
    <script src="js/main.js"></script>
</body>
</html>

<?php } else{
    header('location: login.php');
}

?>