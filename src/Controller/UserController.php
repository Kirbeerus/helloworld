<?php


namespace App\Controller;


use App\Entity\Role;
use App\Entity\User;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{

    public function createUser(EntityManagerInterface $entityManager):Response{
        $user1 = new User();
        $user2 = new User();
        $user3 = new User();

        $user1->setLogin("user1");
        $user2->setLogin("user2");
        $user3->setLogin("user3");

        $user1->setPassword("test1");
        $user2->setPassword("test2");
        $user3->setPassword("test3");

        $user1->setFirstname("john");
        $user2->setFirstname("mickael");
        $user3->setFirstname("ricardo");

        $user1->setLastname("DRACO");
        $user2->setLastname("POTER");
        $user3->setLastname("EXIODA");

        $entityManager->persist($user1);
        $entityManager->flush();
        $entityManager->persist($user2);
        $entityManager->flush();
        $entityManager->persist($user3);
        $entityManager->flush();

        return new Response("User crer");
    }

    public function createRole(EntityManagerInterface  $entityManager):Response{
        $role1 = new Role();
        $role2 = new Role();
        $role3 = new Role();

        $role1->setName("Admin");
        $role2->setName("User");
        $role3->setName("Abonne");

        $role1->setCode("xpcd");
        $role2->setCode("8rpf");
        $role3->setCode("6plf");

        $entityManager->persist($role1);
        $entityManager->flush();
        $entityManager->persist($role2);
        $entityManager->flush();
        $entityManager->persist($role3);
        $entityManager->flush();

        return new Response("role crer");
    }

    public function affectRole(int $rid,int $uid,UserRepository $userRepository,RoleRepository $roleRepository):Response{
        $user = $userRepository->find($uid);
        $role = $roleRepository->find($rid);

        $user->addRole($role);

        return new Response("role affecter");
    }

}