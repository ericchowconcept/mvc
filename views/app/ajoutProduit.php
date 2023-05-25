<?php include(VIEWS . '_partials/header.php'); ?>

<?php 
var_dump($_POST);
echo '<br>';
var_dump($_FILES);
?>

<h1 class="text-center text-primary text-uppercase mt-3">Ajout Produit</h1>
<div class="container mt-4"> 
    <form method="post" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data" pour stocker different les info du fichier -->
        <fieldset> 
            <div class="form-group">
                <label for="nom" class="form-label mt-4">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter name">
                <small class="text-danger"><?= $error['nom'] ?? '' ; ?></small>
            </div>
            <div class="form-group">
                <label for="categorie" class="form-label mt-4">Catégorie</label>
                <select class="form-select" id="categorie" name="categorie">
                    <option <?= (isset($_POST['categorie']) && $_POST['categorie'] == 'T-shirt')? 'selected' : ''; ?>>T-shirt</option>
                    <option <?= (isset($_POST['categorie']) && $_POST['categorie'] == 'Chaussures')? 'selected' : ''; ?>>Chaussure</option>
                    <option <?= (isset($_POST['categorie']) && $_POST['categorie'] == 'Pantalons')? 'selected' : ''; ?>>Pantalon</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image" class="form-label mt-4">Image</label>
                <input class="form-control" type="file" name="image" id="image">
                <small class="text-danger"><?= $error['image'] ?? ""; ?></small>
            </div>
            <div class="form-group">
                <label for="description" class="form-label mt-4">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                <small class="text-danger"><?= $error['description'] ?? ""; ?></small>
            </div>
            <div class="form-group">
                <label for="prix" class="form-label mt-4">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" min="0" step="0.01">
                <small class="text-danger"><?= $error['prix'] ?? ""; ?></small>
            </div>
            <button type="submit" class="btn btn-primary mt-5 col-12">Ajouter</button>
        </fieldset>
    </form> 
</div> 



<?php include(VIEWS . '_partials/footer.php'); ?>


