<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YourController extends AbstractController
{
    #[Route('/create', name: 'create')]

    public function create(EntityManagerInterface $em): Response
    {
        $user = new User();
        $user->setName('John Doe');

        $comment = new Comment();
        $comment->setContent('This is a comment.');
        $comment->setUser($user);

        $em->persist($user);
        $em->persist($comment);
        $em->flush();

        return new Response('Created user id: '.$user->getId().' and comment id: '.$comment->getId());
    }

    
    #[Route("/read/{id}", name: "read")]

    public function read($id, EntityManagerInterface $em): Response
{
        $user = $em->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('No user found for id '.$id);
        }

        return new Response('Found user with name: '.$user->getName());
}

}