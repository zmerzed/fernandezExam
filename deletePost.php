<?php 
   
   require_once 'functions.php';
    
   $post = NULL;

   if (isset($_GET['p'])) {
       $result = deletePost($_GET['p']);
        header('Location: '. pathUrl());
   }
?>