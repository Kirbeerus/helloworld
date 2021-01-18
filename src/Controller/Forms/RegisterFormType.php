<?php


namespace App\Controller\Forms;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;


class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("Nom", TextType::Class,['constraints'=>new NotBlank()]);
        $builder->add("Prenom", TextType::Class,['constraints'=>new NotBlank()]);
        $builder->add("Login", TextType::Class,['constraints'=>new NotBlank()]);
        $builder->add("mdp", PasswordType::Class);
        $builder->add("Date", DateType::Class);
        $builder->add("Valider", SubmitType::Class);
    }


}
