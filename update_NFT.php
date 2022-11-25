<?php require_once 'include/database.php';


    session_start();
    if(!isset($_SESSION['admin'])){ 
        
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
</head>
<body>
    
    <div class="hero">
        <div class="form-box">
           
           
            <?php
                // <!-- select -->
                   $idN = $_GET['id'];
                   $sqlState = $db->prepare("SELECT * FROM nfts WHERE idN = ?");
                   $sqlState->execute([$idN]);
                   $categorie = $sqlState->fetch(PDO::FETCH_ASSOC);

                   $idUser = $categorie['idUser'];
                    $idAd = $categorie['idAd'];

                //    <!-- update -->   
                if(isset($_POST['AddNft'])){
                    $nameN = $_POST['nameN'];
                    $descN = $_POST['descN'];
                    $priceN = $_POST['priceN'];
                    $colN = $_POST['colN'];

                    


                    // session_start();
                    // $idUser = $_SESSION['admin']['idAdmin'];

                    $imageN = $_FILES['imageN']['name'];
                    $filename = uniqid().$imageN;
                    move_uploaded_file($_FILES['imageN']['tmp_name'], 'upload/nft/'.$filename);

                    if(!empty($nameN) && !empty($descN) && !empty($priceN) && !empty($imageN) && !empty($colN)){
                        $sqlState = $db->prepare("UPDATE nfts SET nomN=?, descriptionN=?, prixN=?, imageN=?, idCol=?, idAd=?, idUser=? WHERE idN = ?");
                        $sqlState->execute([$nameN,$descN,$priceN,$filename,$colN,$idAd,$idUser,$idN]);
                    }else{
                        echo 'empty !!!!  ';
                    }
                }
            ?>
            
            <form method="post" id="login" class="input-groupe" enctype="multipart/form-data">
                <h2 class="Admin-title">Admin Add NFT</h2>

                <input type="text" class="input-form" placeholder="name nft" name="nameN" value="<?php echo $categorie['nomN'] ?>">
                <textarea name="descN" id="" cols="30" rows="5" value="<?php echo $categorie['descriptionN'] ?>"></textarea>
                <input type="number" class="input-form" placeholder="price nft" name="priceN" value="<?php echo $categorie['prixN'] ?>">
                <input type="file" class="file-form" name="imageN" value="<?php echo $categorie['imageN'] ?>">

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

<?php } ?>