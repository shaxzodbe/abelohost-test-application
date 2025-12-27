<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title|default:'Blog'} - Blogy.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="/" class="logo">Blogy.</a>
            <nav>
                <a href="/">Home</a>
                <a href="#footer">Contact</a>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <div class="container">
            {block name=content}{/block}
        </div>
    </main>

    <footer id="footer" class="site-footer">
        <div class="container">
            <p>&copy; {$smarty.now|date_format:'%Y'} Blogy. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
