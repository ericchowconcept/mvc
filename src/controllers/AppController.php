<?php

class AppController
{

    public static function index()
    {
        $produits = Produit::findAll();
        include(VIEWS . 'app/index.php');
    }

    public static function ajoutProduit()
    {   
        // *on verifie que UTILISATEUR a cliqué sur le bouton submit.
        if (!empty($_POST))
        {
            // *on crée un tableau vide qui va servir à gere nos erreurs
            $error = [];
            // *on verifie que l'input "nom est vide et dans ce cas on ajoute un msg d'erreur dans le tableau $error(indice'nom')
            if(empty($_POST["nom"]))
            {
                $error['nom'] = "le champs nom est obligatoire";
            }
            if(empty($_POST["description"]))
            {
                $error['description'] = "le champs description est obligatoire";
            }
            if(empty($_POST["prix"]))
            {
                $error['prix'] = "le champs prix est obligatoire";
            }
            // *on vérifie l'input type file
            if(empty($_FILES['image']['name']))
            {
                $error['image'] = "le champs image est obligatoire";
            }
            // *s'il n'y pas d'erreur, on peut traiter l'image et envoyer les données en bdd
            if(!$error)
            {
                // *on vérifie la taille du fichier et si ce fichier est une image
                if($_FILES['image']['size'] < 3000000 && 
                ($_FILES['image']['type'] == 'image/jpeg' ||
                $_FILES['image']['type'] == 'image/png' ||
                $_FILES['image']['type'] == 'image/gif' ||
                $_FILES['image']['type'] == 'image/webp'))
                {
                    // *on crée un nouveau nom pour l'image (unique)
                    $nomImage = date('dmYHis') . $_FILES['image']['name'];
                    // *on a copié le fichier stocker de manière temporaire dans le dossier upload avec son nouveau nom
                    copy($_FILES['image']['tmp_name'], PUBLIC_FOLDER . "/upload/" . $nomImage);
                    // *créer un tableau de donnée avec les données a envoyer en BDD

                    $data = [
                        'nom' => $_POST['nom'],
                        'categorie' => $_POST['categorie'],
                        'image' => $nomImage,
                        'prix' => $_POST['prix'],
                        'description' => $_POST['description']
                    ];
                    // *on utilise la méthode ajouter (static) de la classe Produit afin d'envoyer mes données en BDD
                    Produit::ajouter($data);

                    header('location:' . BASE);
                    exit();
                }
            }

        }
        
        include(VIEWS . 'app/ajoutProduit.php');
    }

    public static function gestionProduit()
    {
        $produits = Produit::findAll();
        include(VIEWS . 'app/gestionProduit.php');
    }

}
