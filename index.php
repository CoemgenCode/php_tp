<?php
require('config.php');
$nomArticle = null;
$contenuArticle= null;
$date = null;
if (isset($_POST['nom_article']) && isset($_POST['contenu_article'])) {
  $nomArticle = htmlspecialchars($_POST['nom_article']);
  $contenuArticle = htmlspecialchars($_POST['contenu_article']);
  $date = new DateTime("now");
  $date = $date->format('Y-m-d H:i:s');


  try {
    // $req = $db->prepare('INSERT INTO  article (nom_article, contenu_article)VALUES(?,?)');
    // $req->bindParam(1, $nomArticle, PDO::PARAM_STR);
    // $req->bi

    $req = $db->prepare('INSERT INTO  article (nom_article, contenu_article, created_at_article)VALUES(:nom_article,:contenu_article, :created_at_article)');
    $req->bindParam('nom_article', $nomArticle, PDO::PARAM_STR);
    $req->bindParam('contenu_article', $contenuArticle, PDO::PARAM_STR);

    $req->bindParam('created_at_article', $date, PDO::PARAM_STR);
    $req->execute();
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<!-- <script>alert('Ceci est une faille XSS');</script> -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form action="articles.php" method="post">
    <input type="text" name="nom_article">
    <input type="text" name="contenu_article">
    <input type="submit" value="Ajouter">
  </form>
</body>

</html>