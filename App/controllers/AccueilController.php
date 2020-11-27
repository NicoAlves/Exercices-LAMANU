<?php

class AccueilController extends Controller
{
//affiche la vue de l'accueil
    public function index()
    {
        //appel de la fonction render de la class Controller qui affiche la vue
        $this->render('accueil/accueil.php',);

    }
}