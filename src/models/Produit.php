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
}

