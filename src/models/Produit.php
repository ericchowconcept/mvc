<?php

class Produit extends Db
{
    public static function ajouter(array $data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO produit(nom, categorie, image, prix, description)
                    VALUES(:nom, :categorie, :image, :prix, :description)";
        $response = $pdo->prepare($request);
        $response->execute($data);
        return $pdo->lastInsertId();
    }

    public static function findAll()
    {
        $request = "SELECT * FROM produit";
        $response = self::getDb()->prepare($request);
        $response->execute();
        

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(array $id)
    {
        $request = "SELECT * FROM produit WHERE id_produit=:id_produit";
        $response = self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function update(array $data)
    {
        $request = "UPDATE produit SET nom=:nom, categorie=:categorie, image=:image,prix=:prix,description=:description WHERE id_produit=:id_produit";
        $response = self::getDb()->prepare($request);
        return $response->execute($data);
    }
}

