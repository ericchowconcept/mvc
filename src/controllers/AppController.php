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

                    $_SESSION['messages']['success'][]='Le produit a bien été ajouté';

                    header('location:' . BASE);
                    exit();
                }
            }

        }
        
        include(VIEWS . 'app/ajoutProduit.php');
    }

    public static function modifierProduit()
    {   
        // *ici on vérifie que notre GET['id'] n'est pasd vide afin de récuperer notre produit
        if(!empty($_GET['id']))
        {
            // *je récupère mon produit grace à son id
            $produit = Produit::findById(['id_produit' => $_GET['id']]);
        }else
        {
            header('location:' . BASE . 'produit/gestion');
            exit();
        }
        // *si l'utilisateur a cliqué sur modifier alors je rentre dans les accolades
        if(!empty($_POST))
        {
            // *création d'un tableau d'erreur vide
            $error =[];
            foreach($_POST as $indice=>$valeur)
            {
                if(empty($valeur))
                {
                    $error[$indice] = "le champ est obligatoire";
                }}
                // *s'il y a pas d'erreur, on fait notre traitement
                if(!$error)
                {
                    // *verifier s'il y a une nouvelle image dans l'input type file avec le bon poid et bon type
                    if((!empty($_FILES['image']['name'])) && 
                    $_FILES['image']['size'] < 3000000 && 
                ($_FILES['image']['type'] == 'image/jpeg' ||
                $_FILES['image']['type'] == 'image/png' ||
                $_FILES['image']['type'] == 'image/gif' ||
                $_FILES['image']['type'] == 'image/webp'))
                {
                    // *on créé un nouveau nom d'image pour la nouvelle image, 
                    $nomImage = date('dmYhis') . $_FILES['image']['name'];
                    // *on supprime l'ancienne image.
                    unlink(PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR . $_POST['ancienneImg']);
                    // *on stocke la nouvelle image
                    copy($_FILES['image']['tmp_name'], PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR . $nomImage);
                }else{
                    // *s'il n y pas nouvelle image, on stocke dans la variable $nomImage, le nom de l'ancienne image
                    $nomImage = $_POST['ancienneImg'];
                }
                // *on procède à la modification en BDD de notre produit
                Produit::update([
                    'nom' => $_POST['nom'],
                    'categorie'=> $_POST['categorie'],
                    'image'=>$nomImage,
                    'description'=>$_POST['description'],
                    'prix'=>$_POST['prix'],
                    'id_produit'=>$_GET['id']                
                ]);
                $_SESSION['messages']['success'][]='Le produit a bien été modifié';

                header('location:' . BASE . 'produit/gestion');
                exit();
                }
            
        }
        include(VIEWS . 'app/modifierProduit.php');
    }

    public static function gestionProduit()
    {
        
        $produits = Produit::findAll();
        include(VIEWS . 'app/gestionProduit.php');
   
    }

    public static function supprimerProduit()
    {
        if(!empty($_GET['id'])){
           $deleteProduit = Produit::deleteById(['id_produit' => $_GET['id']]);  

           $_SESSION['messages']['success'][]='Le produit a bien été supprimé';
        }

       header('location:' . BASE . 'produit/gestion');
       exit();

    }

    public static function voirProduit()
    {
        if(!empty($_GET['id']))
        {
           $produit = Produit::findById(['id_produit' => intval( $_GET['id'])]); 
        // * intval pour indiquer qu'on veut un INT car normalement $_GET['id'] nous retourne un string
        }
        
        
        include(VIEWS . 'app/voirProduit.php');
    }

}
