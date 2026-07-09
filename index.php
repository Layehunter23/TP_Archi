 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet">
    <title>SamaActu</title>

</head>
<body>
    <nav>
   
    
        <ul>
           <a href="index.php"> <li>Accueil</li></a>
        

             <?php 
            require_once __DIR__ . '/models/Article.php';
            $articleModel = new Article();
            $categorie = $articleModel->getCategorie();


            
            foreach($categorie as $cat){
            ?>
                 <a href="index.php?id=<?php echo $cat['id']?>"><li><?php print_r($cat['libelle']); ?></li></a>

             <?php }?> 

                
            <li>
        </ul>
    </nav>
        
    <?php
               
                $menu = $articleModel->getArticleByCategorie();
                
              if (isset($_GET['id'])){
                  foreach($menu as $m){
?>
        <section>
            <div>
                <p><?php print_r($m['titre'])?></p>
                <p><?php print_r($m['contenu']);?></p> 
                <a href="index.php?idCont=<?php echo $m['id']?>"> <button name="supp">Voir Plus</button></a>
                
                <a href="index.php?idSupp=<?php echo $m['id']?>"> <button name="supp">Supprimer</button></a>
            </div>
</section>
<?php }} ?>
<?php
               
    
    $article = $articleModel->getAllArticle();
    $supp = $articleModel -> DeleteArticleById();
    $single = $articleModel->getArticleById();

    if(isset($_GET['idCont'])){
        ?>
        <aside>
        <h1> <?php echo $single['titre'] ?></h1>
        <p>Publie le <?php echo $single['dateCreation']?></p>
        <p><?php echo  $single['contenu'] ?></p>

        <a href="index.php"><button>Retour</button>
</aside>
        <?php
    }
    if(!isset($_GET['id']) && !isset($_GET['idCont'])){
    foreach($article as $ar){
?>
        <section>
            <div>
                <p><?php print_r($ar['titre'])?></p>
                <p><?php print_r($ar['contenu']);?></p>  

                <a href="index.php?idCont=<?php echo $ar['id']?>"> <button name="supp">Voir Plus</button></a>
                
               <a href="index.php?idSupp=<?php echo $ar['id']?>"> <button name="supp">Supprimer</button></a>

                
            </div>
</section>

    
           
    
   <?php
    }
    } 
  
    
    ?>
 
</body>
</html>