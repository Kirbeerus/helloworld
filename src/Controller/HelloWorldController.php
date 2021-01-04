<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends AbstractController
{

    function hello($prenom):Response{
        $returnString = "hello".$prenom;
        return $this->render('hello.html.twig',[
        'prenom' => $prenom
        ]);
    }

    function helloListe():Response{
        $liste = ['patrick','bernard','daniel','jean'];
        return $this->render('helloListe.html.twig',[
            'liste' => $liste,
        ]);
    }

    function form():Response{
        return new Response("<html>
        <body>
            <form method='POST'>
                <input type='text' name='name'>
                <input type='submit'>
            </form>
        </body>
        </html>");
    }

    function form_receive(Request $request):Response{
        $formData = $request->request->get('name');
        return new Response("merci $formData");
    }


}