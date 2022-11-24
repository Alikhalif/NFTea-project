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

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/style.css">

    <title>NFTs</title>
</head>
<body>
    
    <?php include 'include/nav_admin.php'; 
    // session_start();
    if(isset($_SESSION['admin'])){ ?> 


    <main>
        <h1 style="text-align:center;">Welcom Admin</h1>



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

<?php } ?>