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
                <tr class="table-light">
                <th scope="row"><?= $produit['id_produit']; ?></th>
                <td><?= $produit['nom']; ?></td>
                <td><?= $produit['categorie']; ?></td>
                <td><img src="<?= UPLOAD . $produit['image']; ?>" alt="" 
                width="50px"></td>
                <td><?= $produit['prix'] . ' €'; ?></td>
                <td>
                    <a href=""><i class="bi bi-eye text-info"></i></a>

                    <a href="<?= BASE . 'produit/modifier?id=' . $produit['id_produit']; ?>"><i class="bi bi-pencil-square text-primary mx-1"></i></a>

                    <a href="<?= BASE . 'produit/supprimer?id=' . $produit['id_produit']; ?>"><i class="bi bi-trash3 text-warning"></i></a>
                </td>
                <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>









<?php include(VIEWS . '_partials/footer.php'); ?>
