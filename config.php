<?php 
    try {
      $db = new PDO(
        'mysql:host=localhost; dbname=articles',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
      );
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  
      // $req = $db->prepare('INSERT INTO  article (nom_article, contenu_article)VALUES(?,?)');
      // $req->bindParam(1, $nomArticle, PDO::PARAM_STR);
      // $req->bindParam(2, $contenuArticle, PDO::PARAM_STR);
  
    } catch (PDOException $ex) {
      echo $ex->getMessage();
    }
?>