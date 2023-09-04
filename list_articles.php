<?php
require ('config.php');

try {
    $req = $db->prepare("SELECT * FROM article order by 'id_article' asc");
    $req-> execute();
    
    while($contenu = $req-> fetch()) { ?>
    <article>
        <p><?php echo "numéro de l'article : ".$contenu['id_article']?></p>
       
        <p><?php echo "nom de l'article : ".$contenu['nom_article']?></p>
        
        <p><?php echo "contenu de l'article : ".$contenu['contenu_article']?></p>
        
        <p><?php echo "date de publication de l'article : ".$contenu['created_at_article']?></p>

    </article>
    <?php }}
    
    catch (PDOException $e) {
        die ('Erreur : '.$e->getMessage());
    }
    
    $req->closeCursor();

?>