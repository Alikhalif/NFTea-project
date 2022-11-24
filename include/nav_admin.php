<?php 
    session_start();
    if(!isset($_SESSION['admin'])){ ?>

    <header class="row container">
        <a href="#" class="logo">NFTea</a>
        <div class="toggleMenu" onclick="toggleMenu();"></div>
        <nav class="navigation row">
            <ul class="row">
                <!-- <li><a href="index.php">Home</a></li> -->
                <li><a href="Admin_Add_Collection.php">Add Collection</a></li>
                <li><a href="Admin_list_collection.php">Collection</a></li>
                <!-- <li><a href="Update_collection.php">Updat Collection</a></li> -->
                <li><a href="nfts.php">Add NFTs</a></li>
                <li><a href="Admin_list_NFT.php">NFTs</a></li>
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
                <!-- <li><a href="index.php">Home</a></li> -->
                <li><a href="Admin_Add_Collection.php">Add Collection</a></li>
                <li><a href="Admin_list_collection.php">Collection</a></li>
                <!-- <li><a href="Update_collection.php">Updat Collection</a></li> -->
                <li><a href="Admin_Add_Nft.php">Add NFTs</a></li>
                <li><a href="Admin_list_NFT.php">NFTs</a></li>
                <li><a href="stats.php">State</a></li>
                <li><a href="Artist.php">Artist</a></li>
            </ul>
            <a href="logOut.php" class="page-btn active">Log Out</a>
        </nav>
    </header> 
<?php } ?>         