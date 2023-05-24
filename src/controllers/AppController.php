<?php

class AppController
{

    public static function index()
    {
      
        include(VIEWS . 'app/index.php');
    }

    public static function ajoutProduit()
    {
        include(VIEWS . 'app/ajoutProduit.php');
    }


}
