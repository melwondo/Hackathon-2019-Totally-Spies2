<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use GuzzleHttp\Client;

class FightController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(string $idCombattant=null)
    {

        $client = new Client(['base_uri' => 'http://easteregg.wildcodeschool.fr/api/eggs/random',]);
        $joueursOeufs = [];
        $joueur1=null;
        for ($i=0; $i < 4 ; $i++) { 
            $response = $client->request('GET', 'http://easteregg.wildcodeschool.fr/api/eggs/random');
            $body = $response->getBody();
            $joueursOeufs [] = json_decode($body->getContents(), true);
        }

        if($idCombattant != null)
        {
            $response = $client->request('GET', 'http://easteregg.wildcodeschool.fr/api/eggs/'.$idCombattant);
            $body = $response->getBody();
            $joueur1 = json_decode($body->getContents(), true);    
        }

        $response = $client->request('GET', 'http://easteregg.wildcodeschool.fr/api/characters/random');
        $body = $response->getBody();
        $joueur2 = json_decode($body->getContents(), true);

        return $this->twig->render('Fight/index.html.twig', ['joueursOeufs'=> $joueursOeufs, 'joueur1' => $joueur1, 'joueur2'=> $joueur2]);

    }

}


