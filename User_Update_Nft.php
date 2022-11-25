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
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="">
         <!-- update -->
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
        <div class="box">
            <input type="text" class="inpttxt" placeholder="name nft">
            <textarea name="" class="inpttxt" placeholder="description" id="" cols="10" rows="5"></textarea>
            <input type="number" class="inpttxt" placeholder="price nft">
            <input type="file" class="inptfile">

            <select class="inpttxt" name="list_coll" id="">
            <?php
                $collections = $db->query('SELECT * FROM collection')->fetchAll(PDO::FETCH_ASSOC);
                foreach($collections as $collection){
                ?>
                    <option value="">---Enter your photo---</option>
                <?php
                }
            ?>
            </select>

            <input type="submit" class="btn" value="ADD">
        </div>
    </form>
</body>
</html>

<?php } else{
    header('location: login.php');
}

?>