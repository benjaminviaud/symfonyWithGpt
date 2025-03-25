<?php

namespace App\Service;

class ArticleService
{
    private array $articles;

    public function __construct()
    {
        $this->articles = [
            1 => ['id' => 1, 'title' => 'Article 1', 'content' => 'Contenu de l\'article 1', 'author' => 'Auteur A', 'date' => '2025-03-25'],
            2 => ['id' => 2, 'title' => 'Article 2', 'content' => 'Contenu de l\'article 2', 'author' => 'Auteur B', 'date' => '2025-03-24'],
            3 => ['id' => 3, 'title' => 'Article 3', 'content' => 'Contenu de l\'article 3', 'author' => 'Auteur C', 'date' => '2025-03-23'],
        ];
    }

    public function getAllArticles(): array
    {
        return $this->articles;
    }

    public function getArticleById(int $id): ?array
    {
        return $this->articles[$id] ?? null;
    }
}
