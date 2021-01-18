<?php


namespace App\Controller;


use App\Entity\Cake;
use App\Entity\Ingredient;
use App\Repository\CakeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CakeController extends AbstractController
{

    public function createCake(EntityManagerInterface $entityManager):Response{
        $cake = new Cake();
        $cake->setName('tarte Choco');
        $cake->setIsSweet(true);

        $entityManager->persist($cake);
        $entityManager->flush();

        return New Response("Creation réussi du gateau ".$cake->getId());
    }

    public function getCakeById(int $id, CakeRepository $cakeRepository):Response{
        $cake = $cakeRepository->find($id);

        return New Response("Le gateau ".$cake->getId()." a pour nom ".$cake->getName());
    }

}