<?php 
    include_once 'include/database.php';

    $idC = $_GET['id'];

    $sqlState = $db->prepare("DELETE FROM collection WHERE idC = ?");
    $deleted = $sqlState->execute([$idC]);
  
    
    header('location: Admin_list_collection.php');
    
?>