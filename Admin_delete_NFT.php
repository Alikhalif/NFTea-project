<?php 
    include_once 'include/database.php';

    $idN = $_GET['id'];

    $sqlState = $db->prepare("DELETE FROM nfts WHERE idN = ?");
    $deleted = $sqlState->execute([$idN]);
  
    
    header('location: Admin_list_NFT.php');
    
?>