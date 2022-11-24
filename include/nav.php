<?php 
    session_start();
    if(!isset($_SESSION['user_session'])){ ?>
    <header class="row container">
        <a href="#" class="logo">NFTea</a>
        <div class="toggleMenu" onclick="toggleMenu();"></div>
        <nav class="navigation row">
            <ul class="row">
                <li><a href="index.php">Home</a></li>
                <li><a href="collection.php">Collection</a></li>
                <li><a href="nfts.php">NFTs</a></li>
                <li><a href="stats.php">State</a></li>
                <li><a href="Artist.php">Artist</a></li>
            </ul>
            <a href="login.php" class="page-btn active">Sign in</a>
        </nav>
    </header>      
<?php }else{ ?> 
    <header class="row container">
        <a href="#" class="logo">NFTea</a>
        <div class="toggleMenu" onclick="toggleMenu();"></div>
        <nav class="navigation row">
            <ul class="row">
                <li><a href="index.php">Home</a></li>
                <li><a href="collection.php">Collection</a></li>
                <li><a href="nfts.php">NFTs</a></li>
                <li><a href="stats.php">State</a></li>
                <li><a href="Artist.php">Artist</a></li>
            </ul>
            <a href="logOut.php" class="page-btn active">Log Out</a>
        </nav>
    </header> 
<?php } ?>         