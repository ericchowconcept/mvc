<?php include(VIEWS . '_partials/header.php'); ?>


<h1 class="text-center m-3">Modifier Produit</h1>

<?php 
//  echo'<pre>';
//     var_dump($produit);
//     echo'</pre>';
echo'<pre>';
var_dump($_POST);
echo'</pre>';
?>

<div class="container mt-4"> 
    <form method="post" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data" pour stocker different les info du fichier -->
        <fieldset> 
            <input type="hidden" value="<?= $produit['image'] ?? ""; ?>" name="ancienneImg">
            <div class="form-group">
                <label for="nom" class="form-label mt-4">Nom</label>
                <input type="text" class="form-control" id="nom" 
                name="nom" placeholder="Enter name"
                value="<?= $produit['nom'] ?? '' ; ?>">
                <small class="text-danger"><?= $error['nom'] ?? '' ; ?></small>
            </div>
            <div class="form-group">
                <label for="categorie" class="form-label mt-4">Catégorie</label>
                <select class="form-select" id="categorie" name="categorie">
                    <option <?= (isset($produit['categorie']) && $produit['categorie'] == 'T-shirt')? 'selected' : ''; ?>>T-shirt</option>
                    <option <?= (isset($produit['categorie']) && $produit['categorie'] == 'Chaussures')? 'selected' : ''; ?>>Chaussure</option>
                    <option <?= (isset($produit['categorie']) && $produit['categorie'] == 'Pantalons')? 'selected' : ''; ?>>Pantalon</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image" class="form-label mt-4">Image</label>
                <input class="form-control" onchange="loadFile(event)" type="file" name="image" id="image">
                <small class="text-danger"><?= $error['ancienneImg'] ?? ""; ?></small>

                <img src="<?= UPLOAD . $produit['image']; ?>" width="300" alt="">

                <img id="photo" width="300" alt="">
            </div>
            <div class="form-group">
                <label for="description" class="form-label mt-4">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= $produit['description'] ?? ""; ?></textarea>
                <small class="text-danger"><?= $error['description'] ?? ""; ?></small>
            </div>
            <div class="form-group">
                <label for="prix" class="form-label mt-4">Prix</label>
                <input type="number" class="form-control" id="prix" 
                name="prix" min="0" step="0.01" value="<?= $produit['prix'] ?? ""; ?>">
                <small class="text-danger"><?= $error['prix'] ?? ""; ?></small>
            </div>
            <button type="submit" class="btn btn-primary mt-5 col-12">Modifier</button>
        </fieldset>
    </form> 
</div> 

<script>
    let loadFile = function(event)
    {
        let image = document.getElementById('photo');

        image.src = URL.createObjectURL(event.target.files[0]);
    }

</script>



<?php include(VIEWS . '_partials/footer.php'); ?>

