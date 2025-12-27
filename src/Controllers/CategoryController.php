<?php

namespace App\Controllers;

use App\Database;
use PDO;

class CategoryController extends BaseController
{
    public function show($id)
    {
        $db = Database::getInstance()->getConnection();
        $id = (int) $id;

        
        $stmtCat = $db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmtCat->execute([$id]);
        $category = $stmtCat->fetch();

        if (!$category) {
            http_response_code(404);
            echo "Category not found";
            return;
        }

        
        $sort = $_GET['sort'] ?? 'date_desc';
        $orderBy = match ($sort) {
            'views_desc' => 'a.views DESC',
            'date_asc' => 'a.created_at ASC',
            default => 'a.created_at DESC', 
        };

        
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page - 1) * $perPage;

        
        $sqlArticles = "
            SELECT a.* 
            FROM articles a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id = ?
            ORDER BY $orderBy
            LIMIT ? OFFSET ?
        ";

        $stmtArticles = $db->prepare($sqlArticles);
        
        $stmtArticles->bindValue(1, $id, PDO::PARAM_INT);
        $stmtArticles->bindValue(2, $perPage, PDO::PARAM_INT);
        $stmtArticles->bindValue(3, $offset, PDO::PARAM_INT);
        $stmtArticles->execute();
        $articles = $stmtArticles->fetchAll();

        
        $sqlCount = "
            SELECT COUNT(*) 
            FROM articles a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id = ?
        ";
        $stmtCount = $db->prepare($sqlCount);
        $stmtCount->execute([$id]);
        $totalArticles = $stmtCount->fetchColumn();
        $totalPages = ceil($totalArticles / $perPage);

        $this->render('category', [
            'category' => $category,
            'articles' => $articles,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'currentSort' => $sort,
            'title' => $category['name']
        ]);
    }
}
