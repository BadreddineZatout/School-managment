<?php
require_once 'View.php';
class AcceuileView extends View{
    public function Acceuil($articles, $images){?>
    <!DOCTYPE html>
        <html lang="en">
        <?php
            $this->head();
        ?>
            <body>
            <?php
                $this->header();
                $this->diapo($images);
                $this->menu();
                $this->articles($articles);
                $this->footer();
            ?>
            </body>
            <?php
            $this->scripts();
            $this->pager();
            ?>
        </html>
    <?php
    }
    private function head(){
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php   require_once 'includes/link.php'?>
            <link rel="stylesheet" href="../style/acceuil.css">
            <link rel="stylesheet" href="style/articles.css">
            <link rel="stylesheet" href="style/pager.css">
            <title>Acceuil</title>
        </head>
    <?php
    }
    
    private function diapo($images){
        ?>
        <div class="slider-frame">
        <div class="slide-images">
        <?php
            foreach ($images as $image) {
                ?>
            <div class="img-container">
                <img src="<?= $image['image'] ?>" alt="image" width="100%" height="500px">
            </div>
        <?php
            } ?>
        </div>
    </div>
    <?php
    }
    private function articles($articles){
        ?>
        <div class="row mx-auto mb-5">
        
        <div id="a1" class="col-sm-12 card-deck">
        <?php 
            foreach($articles[0] as $article)
            {
        ?> 
            <div class="card col-sm-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href='/?action=article&article=<?= $article['id'] ?>'>Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
        <div id="a2" class="col-sm-12 card-deck">
        <?php 
            foreach($articles[1] as $article)
            {
        ?> 
            <div class="card col-sm-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href='/?action=article&article=<?= $article['id'] ?>'>Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="pager d-flex justify-content-end mt-5 pr-5">
                <div>
                    <button id="previous" class="btn">Previous</button>
                </div>
                <div>
                    <button id="next" class="btn">Next</button>
                </div>
        </div>
    <?php    
    }
    private function pager(){
        ?>
        <script src="../js/pager.js"></script>
    <?php
    }
}
