{extends file='layout.tpl'}

{block name=content}
    <article class="full-article">
        <header class="article-header">
            <div class="article-meta">
                {foreach $categories as $cat}
                    <a href="/category/{$cat.id}" class="badge">{$cat.name}</a>
                {/foreach}
                <span>{$article.created_at|date_format:"%B %e, %Y"}</span>
                <span>{$article.views} views</span>
            </div>
            <h1>{$article.title}</h1>
        </header>

        <div class="article-image">
            <img src="{$article.image_url}" alt="{$article.title}">
        </div>

        <div class="article-content">
            {$article.content}
        </div>
    </article>

    <div class="divider"></div>

    {if $relatedArticles}
        <section class="related-articles">
            <h2 class="section-title">You might also like</h2>
            <div class="grid">
                {foreach $relatedArticles as $article}
                    <article class="card">
                        <a href="/article/{$article.id}" class="card-image">
                            <img src="{$article.image_url}" alt="{$article.title}">
                        </a>
                        <div class="card-content">
                             <h3><a href="/article/{$article.id}">{$article.title}</a></h3>
                        </div>
                    </article>
                {/foreach}
            </div>
        </section>
    {/if}
{/block}
