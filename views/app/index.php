<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center mt-3">Bienvenue sur mon site</h1>

<?php
// echo'<pre>';
// print_r($produits);
// echo'</pre>';
?>


<div class="container">
    <div class="row justify-content-evenly">
        <?php foreach($produits as $produit): ?>
        <div class="card text-white bg-primary mb-3 mx-1 col-4">
            <img src="<?= UPLOAD . $produit['image']; ?>" alt="" class="img-fluid p-2">
            <div class="card-header" ><?= $produit['categorie']; ?></div>
            <div class="card-body">
                <h4 class="card-title"><?= $produit['nom']; ?></h4>
                <p class="card-text"><?= $produit['prix']; ?>€</p>
                <a href="<?= BASE . 'produit/voir?id=' . $produit['id_produit']; ?>"><button class="btn btn-info m-1 col-12">En savoir plus</button></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include(VIEWS . '_partials/footer.php'); ?>
