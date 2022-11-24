<?php require_once 'include/database.php';


    

?>

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

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .crud-div{
        position: relative ;
        transform: translateY(-2rem);
        margin:9px

        }
        .dots{
        position: absolute;
        border-radius: 50%;
        right: 0;
        font-size: 20px;
        cursor: pointer; 
        }
        .trash{
        position: absolute;
        right: 25px;
        font-size: 18px;
        color: red;
        border-radius: 30%;
        }
        .edit{
        position: absolute;
        right: 50px;
        font-size: 20px;
        height: 30px;
        color: #4224eb;
        font-weight: 900;
        }
        .click {
        display: none;
        }
        .click.active {
        display: inline;

        }
    </style>

    <title>NFTs</title>
</head>
<body>
    
    <?php include 'include/nav_admin.php'; 
    // session_start();
    if(isset($_SESSION['admin'])){ 

        
        if(isset($_POST['desc'])){
            $query = "SELECT * FROM collection,nfts 
                        WHERE collection.idC = nfts.idCol
                        order by nfts.prixN desc";

                        
            $nfts = $db->query($query);
                
        }
        else if(isset($_POST['asc'])){
            $query = "SELECT * FROM collection,nfts 
                    WHERE collection.idC = nfts.idCol
                    order by nfts.prixN asc";

            $nfts = $db->query($query);        
                
           
        }else{
            $query = "SELECT * FROM collection,nfts 
                        WHERE collection.idC = nfts.idCol";

            $nfts = $db->query($query); 
        }
            
    
        ?> 


    <main>
        <section class="new-product">
            <div class="container">
                <div class="section-header-wrapper">
                    <h2 class="h2 section-title">NFTs</h2>
                    <!-- <button class="btn btn-primary">View all</button> -->
                    <!-- <div class="sort-icon">
                        <button name="desc"><i class="ri-sort-desc"></i></button>
                        <button name="desc"><i class="ri-sort-asc"></i></button>
                    </div> -->
                    
                </div>
            </div>

            <ul class="product-list">

            <?php
                foreach($nfts as $nft){

                
            ?>    

                <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="upload/nft/<?php echo $nft['imageN'] ?>" alt="image nft">
                            
                            <!-- <button class="place-bid-btn">Place bid</button> -->
                        </figure>

                        <div class="product-content">
                            <a href="" class="h4 product-title"><?php echo $nft['nomN'] ?></a>

                            <div class="crud-div crud">
                                <i class='bx bx-dots-vertical-rounded dots'></i>
                                <div class="click">
                                    <a href="update_NFT.php?id=<?php echo $nft['idN'] ?>"><i class='bx bxs-edit-alt edit'></i></a>
                                    <a href="Admin_delete_NFT.php?id=<?php echo $nft['idN'] ?>"><i class='bx bxs-trash trash' ></i></a>
                                </div>
                            </div>

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

                <?php  } ?>

                <!-- <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="images/nfts/nft_lion.jpg" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>

                        <div class="product-content">
                            <a href="" class="product-title">Title NFT</a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="images/Artist/ARtist.jfif" alt="">
                                    </figure>

                                    <div class="author-content">
                                        <h4 class="h5 author-username">Jack</h4>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <p class="price">0.23ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="images/nfts/nft_lion.jpg" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>

                        <div class="product-content">
                            <a href="" class="h4 product-title">Title NFT</a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="images/Artist/ARtist.jfif" alt="">
                                    </figure>

                                    <div class="author-content">
                                        <h4 class="h5 author-username">Jack</h4>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <p class="price">0.23ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="images/nfts/nft_lion.jpg" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>

                        <div class="product-content">
                            <a href="" class="h4 product-title">Title NFT</a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="images/Artist/ARtist.jfif" alt="">
                                    </figure>

                                    <div class="author-content">
                                        <h4 class="h5 author-username">Jack</h4>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <p class="price">0.23ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="images/nfts/nft_lion.jpg" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>

                        <div class="product-content">
                            <a href="" class="h4 product-title">Title NFT</a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="images/Artist/ARtist.jfif" alt="">
                                    </figure>

                                    <div class="author-content">
                                        <h4 class="h5 author-username">Jack</h4>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <p class="price">0.23ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="images/nfts/nft_lion.jpg" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>

                        <div class="product-content">
                            <a href="" class="h4 product-title">Title NFT</a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="images/Artist/ARtist.jfif" alt="">
                                    </figure>

                                    <div class="author-content">
                                        <h4 class="h5 author-username">Jack</h4>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <p class="price">0.23ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="images/nfts/nft_lion.jpg" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>

                        <div class="product-content">
                            <a href="" class="h4 product-title">Title NFT</a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="images/Artist/ARtist.jfif" alt="">
                                    </figure>

                                    <div class="author-content">
                                        <h4 class="h5 author-username">Jack</h4>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <p class="price">0.23ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-card">
                        <figure class="product-banner">
                            <img src="images/nfts/nft_lion.jpg" alt="image nft">
                            
                            <button class="place-bid-btn">Place bid</button>
                        </figure>

                        <div class="product-content">
                            <a href="" class="h4 product-title">Title NFT</a>
                            <div class="product-meta">
                                <div class="product-author">
                                    <figure class="author-img">
                                        <img src="images/Artist/ARtist.jfif" alt="">
                                    </figure>

                                    <div class="author-content">
                                        <h4 class="h5 author-username">Jack</h4>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <p class="price">0.23ETR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> -->
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
    <script>
        let dotsCrud = document.querySelectorAll('.dots');
        let crud = document.getElementsByClassName("click");
        for(let i = 0; i < crud.length; i++) {
            dotsCrud[i].onclick = function() {
            crud[i].classList.toggle('active');
            }
        }
    </script>
    <script src="js/main.js"></script>
</body>
</html>

<?php }?> 