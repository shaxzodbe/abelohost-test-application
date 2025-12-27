<?php

namespace App\Controllers;

use App\Database;
use PDO;

class HomeController extends BaseController
{
    public function index()
    {
        $db = Database::getInstance()->getConnection();

        $sqlCategories = "
            SELECT DISTINCT c.* 
            FROM categories c
            INNER JOIN article_category ac ON c.id = ac.category_id
            ORDER BY c.name ASC
        ";
        $stmtCats = $db->query($sqlCategories);
        $categories = $stmtCats->fetchAll();

        foreach ($categories as &$category) {
            $stmtPosts = $db->prepare("
                SELECT a.* 
                FROM articles a
                JOIN article_category ac ON a.id = ac.article_id
                WHERE ac.category_id = ?
                ORDER BY a.created_at DESC
                LIMIT 3
            ");
            $stmtPosts->execute([$category['id']]);
            $category['latest_posts'] = $stmtPosts->fetchAll();
        }

        $sqlLatest = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 3";
        $stmtLatest = $db->query($sqlLatest);
        $latestArticles = $stmtLatest->fetchAll();

        $this->render('home', [
            'categories' => $categories,
            'latestArticles' => $latestArticles,
            'title' => 'Home'
        ]);
    }
}
