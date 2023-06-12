<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class HomePageController extends AbstractController
{
    #[Route('/',name:"home_page")]
    public function index(Request $request): Response
    {
        if($request->query->count()>0){
            $a = $request->get('nombre-a');
            $b = $request->get('nombre-b');
            $signe = $request->get('signe');
            if($signe == "+"){
                $value = $a +$b;
            }else if($signe == "*"){
                $value = $a *$b;
            }else if($signe == "-"){
                $value = $a -$b;
            }else if($signe == "/"){
                $value = $a /$b;
            }else{
                $value = "impossible";
            }
            return $this->redirectToRoute('app_resultat',['value'=>$value]);
        }
        return $this->render('home_page/index.html.twig',);
    }
    #[Route('/Resultat/{value}',name:'app_resultat')]
    public function Resultat($value){
        return $this->render('home_page/Resultat.html.twig',['value'=>$value]);
    }
}
