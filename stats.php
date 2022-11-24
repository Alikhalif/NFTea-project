<?php require_once 'include/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Stats</title>
</head>
<body>
    <main>
        
        <?php include 'include/nav.php';
        
            $count_Nft = $db->query("SELECT count(*) FROM nfts");
            $count_Nft->execute();


            $count_Collection = $db->query("SELECT count(*) FROM collection");
            $count_Collection->execute();

            $count_User = $db->query("SELECT count(*) FROM user");
            $count_User->execute();

            $max_Price= $db->query("SELECT max(prixN) from nfts");
            $max_Price->execute();
            $max_Price_Val = $max_Price->fetchColumn();

            $min_Price= $db->query("SELECT min(prixN) from nfts");
            $min_Price->execute();
            $min_Price_Val = $min_Price->fetchColumn();
            
        ?>    



        <section>
            <div class="state-container">
                <div class="wrapper">
                    <div class="text-component">
                        <div>
                            <h1 class="title">Get <span>insights</span> that help your business grow.</h1>
                        </div>
                        
                        <div class="stat-box">
                            <div>
                                <p class="num"><?php echo $count_Nft->fetchColumn() ?></p>
                                <p>NFT</p>
                            </div>
                            <div>
                                <p class="num"><?php echo $count_Collection->fetchColumn() ?></p>
                                <p>Collection</p>
                            </div>
                            <div>
                                <p class="num"><?php echo $count_User->fetchColumn() ?></p>
                                <p>User</p>
                            </div>
                        </div>
                    </div>

                    <div class="img-component">
                        <img src="images/stateNFT.webp" alt="image stats">
                    </div>

                </div>

                


            </div>
            
        </section>

        <section class="stats-nft">
            <h2>the most expensive and the cheapest NFT </h2>
            
            <ul class="product-list between">
                
                <?php
                    $query = "SELECT * FROM collection,nfts
                                WHERE collection.idC = nfts.idCol
                                AND nfts.prixN = $max_Price_Val limit 1";
                    $MaxNfts= $db->query($query);
                    
                    foreach($MaxNfts as $nft){
                ?>

                <li class="product-item ">
                    <h3>the most <span> &nbsp&nbsp&nbsp</span><i class='bx bxs-rocket' style='color:#ffffff'  ></i></h3>
                    <div class="product-card bg1">
                        <figure class="product-banner">
                            <img src="upload/nft/<?php echo $nft['imageN'] ?>" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>
    
                        <div class="product-content">
                            <a href="" class="h4 product-title"><?php echo $nft['nomN'] ?></a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="upload/collectionImg/<?php echo $nft['imgartist'] ?>" alt="">
                                    </figure>
    
                                    <div class="author-content">
                                        <h4 class="h5 author-username"><?php echo $nft['nomartiste'] ?></h4>
                                    </div>
                                </div>
    
                                <div class="product-price">
                                    <p class="price"><?php echo $nft['prixN'] ?>ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                
                <?php } ?>


                <?php
                    $query = "SELECT * FROM collection,nfts
                                WHERE collection.idC = nfts.idCol
                                AND nfts.prixN = $min_Price_Val limit 1";
                    $MaxNfts= $db->query($query);
                    
                    foreach($MaxNfts as $nft){
                ?>
                
                <li class="product-item">
                    <h3>the cheapest <span> &nbsp&nbsp&nbsp</span><i class='bx bxs-rocket bx-flip-vertical' style='color:#ffffff' ></i></h3>
                    <div class="product-card bg2">
                        <figure class="product-banner">
                            <img src="upload/nft/<?php echo $nft['imageN'] ?>" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>
    
                        <div class="product-content">
                            <a href="" class="h4 product-title"><?php echo $nft['nomN'] ?></a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="upload/collectionImg/<?php echo $nft['imgartist'] ?>" alt="">
                                    </figure>
    
                                    <div class="author-content">
                                        <h4 class="h5 author-username"><?php echo $nft['nomartiste'] ?></h4>
                                    </div>
                                </div>
    
                                <div class="product-price">
                                    <p class="price"><?php echo $nft['prixN'] ?>ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <?php } ?>

            </ul>
            
        </section>

        <!-- footer -->
        <div class="container">
            <footer>

                <div>
                    <h2>The world Of NFT's</h2>
                    <p>NFT's are transforming the way commece is transacted</p>
                <hr/>
                <h3>Get pur latest updates</h3>
                <form action="">
                    <div class="input-wrap">
                        <input type="email" placeholder="Entrer Your Email">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
                </div>

                <div>
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Protocole Explore</a></li>
                        <li><a href="#">System Token</a></li>
                        <li><a href="#">Optimize Time</a></li>
                        <li><a href="#">Visual Checking</a></li>
                        <li><a href="#">Activity Log </a></li>
                        <li><a href="#">System Auto Since</a></li>
                    </ul>
                </div>

                <div>
                    <h3>Informtion</h3>
                    <ul>
                        <li><a href="#">Market Explore</a></li>
                        <li><a href="#">Ready Token</a></li>
                        <li><a href="#">Main Option</a></li>
                        <li><a href="#">File Checking</a></li>
                        <li><a href="#">Blog Grid</a></li>
                        <li><a href="#">Fix Bug</a></li>
                    </ul>
                </div>

                <div>
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">Upload Files</a></li>
                        <li><a href="#">Marketplace</a></li>
                        <li><a href="#">Item Details</a></li>
                        <li><a href="#">Recent Activity</a></li>
                        <li><a href="#">Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>


                <div>
                    <h3>Social Media</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Linkedin</a></li>
                        <li><a href="#">Whatssap</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Telegram></li>
                    </ul>
                </div>
            </footer>
        </div>
    </main>

    <!--=============== MAIN JS ===============-->
    <script src="js/main.js"></script>
</body>
</html>