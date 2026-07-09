
<?php

class Article{

       
  public function getCategorie(){
       $user = "mglsi_user";
        $pass = "passer";
         $pdo = new PDO("mysql:host=localhost;dbname=mglsi_news",$user,$pass);
         $sql1 = "SELECT * from categorie";
        $request = $pdo->query($sql1);
        $categorie = $request->fetchAll(PDO::FETCH_ASSOC);
       return $categorie;
        
                 
    }

    function getAllArticle(){
       $user = "mglsi_user";
        $pass = "passer";
         $pdo = new PDO("mysql:host=localhost;dbname=mglsi_news",$user,$pass);
        $sql = "SELECT * from article";
    $request = $pdo->query($sql);
    $article = $request->fetchAll(PDO::FETCH_ASSOC);

    return $article;
     
}

function getArticleByCategorie(){
    if (isset($_GET['id'])){
        $user = "mglsi_user";
        $pass = "passer";
         $pdo = new PDO("mysql:host=localhost;dbname=mglsi_news",$user,$pass);
                $idsele = $_GET['id'];
                $sql2 = "SELECT * from article where categorie=$idsele";
                $request = $pdo->query($sql2);
                $menu = $request->fetchAll(PDO::FETCH_ASSOC);
    return $menu;
    }
    

}

function DeleteArticleById(){
    if(isset($_GET['idSupp'])){
    $idSupp = $_GET['idSupp'];
    $user = "mglsi_user";
        $pass = "passer";
        $pdo = new PDO("mysql:host=localhost;dbname=mglsi_news",$user,$pass);
        $sql = "DELETE FROM article where id=$idContenu";
        $request = $pdo->query($sql);
    ?>
    <script>alert(`Article Supprime`)</script>
    <?php
}

}

function getArticleById(){
    if(isset($_GET['idCont'])){
    $idContenu = $_GET['idCont'];
    $user = "mglsi_user";
        $pass = "passer";
        $pdo = new PDO("mysql:host=localhost;dbname=mglsi_news",$user,$pass);
        $sql = "SELECT * FROM article where id=$idContenu";
        $request = $pdo->query($sql);
        $single = $request->fetch(PDO::FETCH_ASSOC);
        return $single;

}

}
}
?>