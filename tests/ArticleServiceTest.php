<?php

namespace App\Tests\Service;

use App\Service\ArticleService;
use PHPUnit\Framework\TestCase;

class ArticleServiceTest extends TestCase
{
    private ArticleService $articleService;

    protected function setUp(): void
    {
        $this->articleService = new ArticleService();
    }

    public function testGetAllArticles(): void
    {
        $articles = $this->articleService->getAllArticles();

        $this->assertIsArray($articles);
        $this->assertCount(3, $articles);
    }

    public function testGetArticleByIdSuccess(): void
    {
        $article = $this->articleService->getArticleById(1);

        $this->assertIsArray($article);
        $this->assertEquals('Article 1', $article['title']);
    }

    public function testGetArticleByIdFailure(): void
    {
        $article = $this->articleService->getArticleById(999);

        $this->assertNull($article);
    }
}
