<?php
/**
 * Created by PhpStorm.
 * User: ThinkCenter
 * Date: 29/11/2018
 * Time: 23:07
 */

namespace App\Controller;


use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/hello/{prenom}/{age}", name="hello")
     *
     * La page qui dit bonjour
     *
     * @return Response
     */
    public function hello($prenom = null, $age = null) {
        return new Response("Je m'appele " . $prenom . " et j'ai " . $age . " ans.");
    }

    /**
     * @Route("/", name="homepage")
     * @param AdRepository $adRepo
     * @return Response
     */
    public function home(AdRepository $adRepo)
    {
        $prenoms =
            [
                "Lior" => 45,
                "Benjamin" => 31,
                "Vendetta" => 12,
                "Georgina" => 55,
                "Veronica" => 35
            ];

        return $this->render(
            'home.html.twig',
            [
                "ads" => $adRepo->findBestAds(10)
            ]
        );
    }

}

