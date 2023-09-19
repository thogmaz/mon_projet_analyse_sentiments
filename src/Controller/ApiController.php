<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    
     #[Route("/api/articles", name:"api_articles_list", methods:"GET")]
    
    public function listArticles(ArticleRepository $articleRepository): JsonResponse
    {
        $articles = $articleRepository->findAll();
        $data = $this->serializer->serialize($articles, 'json');

        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }

    
     #[Route("/api/articles/{id}", name:"api_article_detail", methods:"GET")]
    
    public function articleDetail(Article $article): JsonResponse
    {
        $data = $this->serializer->serialize($article, 'json');

        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }

    
     #[Route("/api/articles", name:"api_article_create", methods:"POST")]
    
    public function createArticle(Request $request): JsonResponse
    {
        // Ici, vous devriez ajouter une logique pour créer un nouvel article
        // à partir des données de la requête (par exemple, en utilisant un formulaire Symfony pour gérer la soumission des données).

        return new JsonResponse(['message' => 'Article created'], JsonResponse::HTTP_CREATED);
    }

    
     #[Route("/api/articles/{id}", name:"api_article_update", methods:"PUT")]
    
    public function updateArticle(Article $article, Request $request): JsonResponse
    {
        // Ici, vous devriez ajouter une logique pour mettre à jour l'article existant
        // avec les données de la requête.

        return new JsonResponse(['message' => 'Article updated'], JsonResponse::HTTP_OK);
    }

    
     #[Route("/api/articles/{id}", name:"api_article_delete", methods:"DELETE")]
    
    public function deleteArticle(Article $article): JsonResponse
    {
        // Ici, vous devriez ajouter une logique pour supprimer l'article.

        return new JsonResponse(['message' => 'Article deleted'], JsonResponse::HTTP_NO_CONTENT);
    }
}

