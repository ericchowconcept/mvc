<?php include(VIEWS . '_partials/header.php'); ?>


<?php
// echo'<pre>';
// print_r($produits);
// echo'</pre>';
?>

<h1 class="text-center m-3">Gestion Produit</h1>

<div class="container">
    <div class="row justify-content-evenly">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Image</th>
                <th scope="col">Prix</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit): ?>
                    <div class="modal fade" role="dialog" tabindex="-1"  aria-hidden= "true" id="modalSupprimer" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Supprimer Produit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes vous sur de vouloir supprimer?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= BASE . 'produit/supprimer?id=' . $produit['id_produit']; ?>" class="btn btn-danger">Supprimer</a>

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                     </div>
                <tr class="table-light">
                    <th scope="row"><?= $produit['id_produit']; ?></th>
                    <td><?= $produit['nom']; ?></td>
                    <td><?= $produit['categorie']; ?></td>
                    <td><img src="<?= UPLOAD . $produit['image']; ?>" alt="" 
                    width="50px"></td>
                    <td><?= $produit['prix'] . ' €'; ?></td>
                    <td>
                        <a href="<?= BASE . 'produit/voir?id=' . $produit['id_produit']; ?>"><i class="bi bi-eye text-info"></i></a>

                        <a href="<?= BASE . 'produit/modifier?id=' . $produit['id_produit']; ?>"><i class="bi bi-pencil-square text-primary mx-1"></i></a>

                        <a data-bs-toggle="modal" data-bs-target="#modalSupprimer" href="" class="text-danger"><i class="bi bi-trash3"></i></a>
                    </td>
                <?php endforeach; ?>
                </tr>
                <tr>
                    <td colspan="6">
                        <a class="dropdown-item" href="<?= BASE . 'produit/ajout'; ?>">
                        <button type="submit" class="btn btn-light col-12"><i class="bi bi-plus-circle-dotted"></i></button> 
                        </a> 
                    </td>
                </tr>
              

            </tbody>
        </table>
    </div>
</div>









<?php include(VIEWS . '_partials/footer.php'); ?>
