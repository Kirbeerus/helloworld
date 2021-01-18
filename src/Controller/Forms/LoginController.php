<?php


namespace App\Controller\Forms;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{

    function accueil():Response{
        return new Response("accueil");
    }

    function login():Response{
        $form = $this->createForm(LoginFormType::class);

        return $this->render('Login.html.twig',[
            "form" => $form->createView(),
        ]);
    }

    function loginPost(Request $request):Response{

        $form = $this->createForm(LoginFormType::class);
        $accounts = [['login'=> 'admin','mdp' => 'azerty12345'],['login' => 'user','mdp'=>'98765uiop']];
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            if(in_array($data,$accounts)){
                return $this->redirect('/');
            }else{
                return $this->redirectToRoute('login');
            }
        }else{
            return $this->redirectToRoute('login');
        }
    }

    function create(){
        $form = $this->createForm(RegisterFormType::class);

        return $this->render('Login.html.twig',[
            "form" => $form->createView(),
        ]);
    }

    private function creationFormulaire(){
        $formBuilder = $this->createFormBuilder();

        $formBuilder->add("login", TextType::Class);
        $formBuilder->add("mdp", PasswordType::Class);
        $formBuilder->add("Connexion", SubmitType::Class);

        return $formBuilder->getForm();
    }
}