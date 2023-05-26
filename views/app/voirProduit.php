<?php include(VIEWS . '_partials/header.php'); ?>



<div class="container">
    <div class="row justify-content-evenly">
   
        <div class="card mb-3">
            <h3 class="card-header my-2"><?= $produit['nom']; ?></h3>
            <div class="row">
                <div class="col-6">
                    <img src="<?= UPLOAD . $produit['image']; ?>" alt="" width="500px" class="img-fluid p-2">
                </div>
                <div class="card-body col-6">
                    <p class="card-text text-primary"><?= $produit['prix']; ?>€</p>
                    <p class="card-text"><?= $produit['description']; ?></p>
                    <a href="<?= BASE . 'produit/modifier?id=' . $produit['id_produit']; ?>"><button class="btn btn-primary m-1 col-3">Modifier</button></a>
                </div>
            </div>
            
            <div class="card-footer text-muted text-center">
            <a class="nav-link active" href="<?= BASE; ?>">
                <button class="btn  btn-primary m-1 col-6">Retouner à l'accueil</button>
            </a>
            </div> 
        </div>  
       
    </div> 
</div>











<?php include(VIEWS . '_partials/footer.php'); ?>