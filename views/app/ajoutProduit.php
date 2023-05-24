<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center text-primary text-uppercase mt-3">Ajout Produit</h1>
<div class="container mt-4"> 
    <form>
        <fieldset> 
            <div class="form-group">
                <label for="nom" class="form-label mt-4">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="categorie" class="form-label mt-4">Catégorie</label>
                <select class="form-select" id="categorie" name="categorie">
                    <option>T-shirt</option>
                    <option>Chaussure</option>
                    <option>Pantalon</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image" class="form-label mt-4">Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="description" class="form-label mt-4">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="prix" class="form-label mt-4">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" min="0" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary mt-5 col-12">Ajouter</button>
        </fieldset>
    </form> 
</div> 



<?php include(VIEWS . '_partials/footer.php'); ?>


