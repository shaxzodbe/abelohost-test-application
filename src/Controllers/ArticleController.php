<?php

namespace App\Controllers;

use App\Database;
use PDO;

class ArticleController extends BaseController
{
    public function show($id)
    {
        $db = Database::getInstance()->getConnection();
        $id = (int) $id;

        $stmtView = $db->prepare("UPDATE articles SET views = views + 1 WHERE id = ?");
        $stmtView->execute([$id]);

        $stmt = $db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        $article = $stmt->fetch();

        if (!$article) {
            http_response_code(404);
            echo "Article not found";
            return;
        }

        $stmtCats = $db->prepare("
            SELECT c.* 
            FROM categories c
            JOIN article_category ac ON c.id = ac.category_id
            WHERE ac.article_id = ?
        ");
        $stmtCats->execute([$id]);
        $categories = $stmtCats->fetchAll();

        $catIds = array_column($categories, 'id');
        $relatedArticles = [];

        if (!empty($catIds)) {
            $inQuery = implode(',', array_fill(0, count($catIds), '?'));
            $sqlRelated = "
                SELECT DISTINCT a.* 
                FROM articles a
                JOIN article_category ac ON a.id = ac.article_id
                WHERE ac.category_id IN ($inQuery)
                AND a.id != ?
                LIMIT 3
            ";
            
            $params = array_merge($catIds, [$id]);

            $stmtRelated = $db->prepare($sqlRelated);
            $stmtRelated->execute($params);
            $relatedArticles = $stmtRelated->fetchAll();
        }

        $this->render('article', [
            'article' => $article,
            'categories' => $categories,
            'relatedArticles' => $relatedArticles,
            'title' => $article['title']
        ]);
    }
}
