<?php

namespace App\Controller;

use App\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    #[Route('/articles', name: 'articles')]
    public function index(): Response
    {
        $articles = $this->articleService->getAllArticles();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/article/{id}', name: 'article_show')]
    public function show(int $id): Response
    {
        $article = $this->articleService->getArticleById($id);

        if (!$article) {
            throw $this->createNotFoundException('Article non trouvé.');
        }

        return $this->render('articles/show.html.twig', [
            'article' => $article,
        ]);
    }
}
