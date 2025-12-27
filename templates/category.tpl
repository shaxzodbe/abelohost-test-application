{extends file='layout.tpl'}

{block name=content}
    <div class="page-header">
        <h1>{$category.name}</h1>
        <p>{$category.description}</p>
    </div>

    <div class="controls">
        <span class="sort-label">Sort by:</span>
        <div class="sort-options">
            <a href="?sort=date_desc" class="{if $currentSort == 'date_desc'}active{/if}">Newest</a>
            <a href="?sort=date_asc" class="{if $currentSort == 'date_asc'}active{/if}">Oldest</a>
            <a href="?sort=views_desc" class="{if $currentSort == 'views_desc'}active{/if}">Popular</a>
        </div>
    </div>

    <div class="grid">
        {foreach $articles as $article}
            <article class="card">
                <a href="/article/{$article.id}" class="card-image">
                    <img src="{$article.image_url}" alt="{$article.title}">
                </a>
                <div class="card-content">
                    <div class="card-meta">
                        <span>{$article.created_at|date_format:"%B %e, %Y"}</span>
                        <span>&bull;</span>
                        <span>{$article.views} views</span>
                    </div>
                    <h3><a href="/article/{$article.id}">{$article.title}</a></h3>
                    <p>{$article.description|truncate:100}</p>
                    <a href="/article/{$article.id}" class="read-more">Read More</a>
                </div>
            </article>
        {foreachelse}
            <p>No articles found in this category.</p>
        {/foreach}
    </div>

    {if $totalPages > 1}
        <div class="pagination">
            {if $currentPage > 1}
                <a href="?page={$currentPage-1}&sort={$currentSort}">&laquo;</a>
            {/if}
            
            {for $page=1 to $totalPages}
                <a href="?page={$page}&sort={$currentSort}" class="{if $page == $currentPage}active{/if}">{$page}</a>
            {/for}

            {if $currentPage < $totalPages}
                <a href="?page={$currentPage+1}&sort={$currentSort}">&raquo;</a>
            {/if}
        </div>
    {/if}
{/block}
