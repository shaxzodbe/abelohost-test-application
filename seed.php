<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Database;

$maxRetries = 10;
$retry = 0;
$connected = false;

while ($retry < $maxRetries) {
    try {
        $db = Database::getInstance()->getConnection();
        $connected = true;
        break;
    } catch (PDOException $e) {
        echo "Waiting for database... ($retry/$maxRetries)\n";
        sleep(2);
        $retry++;
    }
}

if (!$connected) {
    die("Could not connect to database.\n");
}

try {
    echo "Seeding database...\n";

    $sql = file_get_contents(__DIR__ . '/database.sql');
    $db->exec($sql);

    $db->exec("SET FOREIGN_KEY_CHECKS = 0");
    $db->exec("TRUNCATE TABLE article_category");
    $db->exec("TRUNCATE TABLE articles");
    $db->exec("TRUNCATE TABLE categories");
    $db->exec("SET FOREIGN_KEY_CHECKS = 1");

    $categories = [
        ['Tech', 'Latest technology news and reviews'],
        ['Lifestyle', 'Tips for a better life'],
        ['Travel', 'Explore the world with us'],
        ['Food', 'Delicious recipes and food guides']
    ];

    $catIds = [];
    $stmtCat = $db->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
    foreach ($categories as $cat) {
        $stmtCat->execute($cat);
        $catIds[] = $db->lastInsertId();
    }
    echo "Inserted " . count($categories) . " categories.\n";

    $titles = [
        'The Future of AI',
        'Top 10 Travel Destinations',
        'Healthy Morning Routine',
        'Best Pasta Recipes',
        'Understanding Quantum Computing',
        'Solo Travel Guide',
        'Minimalist Living',
        'Homemade Pizza Secrets',
        'Gadgets of 2024',
        'Meditation 101',
        'Hidden Gems in Europe',
        'Vegan Diet Benefits',
        'Space Exploration',
        'Coffee Culture',
        'Remote Work Tips',
        'Sustainable Fashion'
    ];

    $images = [
        'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=800&q=80', // Tech
        'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=800&q=80', // Travel
        'https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=800&q=80', // Lifestyle
        'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?auto=format&fit=crop&w=800&q=80'  // Food
    ];

    $stmtArticle = $db->prepare("INSERT INTO articles (title, description, content, image_url, views, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmtLink = $db->prepare("INSERT INTO article_category (article_id, category_id) VALUES (?, ?)");

    for ($i = 0; $i < 50; $i++) {
        $title = $titles[$i % count($titles)] . " " . ($i + 1);
        $desc = "This is a short description for $title. It gives a brief overview of what the article is about.";
        $content = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
        $image = $images[$i % count($images)];
        $views = rand(10, 1000);
        $date = date('Y-m-d H:i:s', strtotime("-" . rand(0, 30) . " days"));

        $stmtArticle->execute([$title, $desc, $content, $image, $views, $date]);
        $articleId = $db->lastInsertId();

        $numCats = rand(1, 2);
        $randomKeys = (array) array_rand($catIds, $numCats);

        if (!is_array($randomKeys)) {
            $randomKeys = [$randomKeys];
        }

        foreach ($randomKeys as $key) {
            $stmtLink->execute([$articleId, $catIds[$key]]);
        }
    }

    echo "Inserted " . count($titles) . " articles.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
