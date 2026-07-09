 
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
        $user = "root";
        $pass = "";
        $pdo = new PDO("mysql:host=localhost;dbname=mglsi_news",$user,$pass);
         $sql1 = "SELECT * from categorie";
        $request = $pdo->query($sql1);
        $categorie = $request->fetchAll(PDO::FETCH_ASSOC);
           

            
            
                 foreach($categorie as $cat){
            ?>
                 <a href="index.php?id=<?php echo $cat['id']?>"><li><?php print_r($cat['libelle']); ?></li></a>
                
             <?php }?> 

                
            <li>
        </ul>
    </nav>

    <?php
    $sql = "SELECT * from article";
    $request = $pdo->query($sql);
    $article = $request->fetchAll(PDO::FETCH_ASSOC);

  
     if (isset($_GET['id'])){
                $idsele = $_GET['id'];
                $sql2 = "SELECT * from article where categorie=$idsele";
                $request = $pdo->query($sql2);
                $menu = $request->fetchAll(PDO::FETCH_ASSOC);

                  foreach($menu as $m){
?>
        <section>
            <div>
                <p><?php print_r($m['titre'])?></p>
                <p><?php print_r($m['contenu']);?></p> 
                <button>Voir Plus</button>
            </div>
</section>
<?php } ?>
<?php
                  }
    if(!isset($_GET['id'])){
    foreach($article as $ar){
?>
        <section>
            <div>
                <p><?php print_r($ar['titre'])?></p>
                <p><?php print_r($ar['contenu']);?></p> 
                <button>Voir Plus</button>
                <button name="supp">Supprimer</button>

                
            </div>
</section>

    
           
    
   <?php
    }
    } 
  
    
    ?>
 
</body>
</html>