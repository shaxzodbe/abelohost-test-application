{extends file='layout.tpl'}

{block name=content}
    <section class="latest-posts">
        <h2 class="section-title">Fresh from the Blog</h2>
        <div class="grid">
            {foreach $latestArticles as $article}
                <article class="card">
                    <a href="/article/{$article.id}" class="card-image">
                        <img src="{$article.image_url}" alt="{$article.title}">
                    </a>
                    <div class="card-content">
                        <div class="card-meta">
                            <span>{$article.created_at|date_format:"%B %e, %Y"}</span>
                        </div>
                        <h3><a href="/article/{$article.id}">{$article.title}</a></h3>
                        <p>{$article.description|truncate:100}</p>
                        <a href="/article/{$article.id}" class="read-more">Read More</a>
                    </div>
                </article>
            {/foreach}
        </div>
    </section>

    {foreach $categories as $category}
        {if $category.latest_posts}
            <div class="divider"></div>
            
            <section class="category-section">
                <div class="category-header">
                    <div>
                        <h2 class="section-title" style="margin-bottom: 0.5rem;">{$category.name}</h2>
                        <p class="category-desc" style="color: #666; margin-bottom: 0;">{$category.description}</p>
                    </div>
                    <a href="/category/{$category.id}" class="btn-outline">View All</a>
                </div>
                
                <div class="grid">
                    {foreach $category.latest_posts as $article}
                        <article class="card">
                            <a href="/article/{$article.id}" class="card-image">
                                <img src="{$article.image_url}" alt="{$article.title}">
                            </a>
                            <div class="card-content">
                                <div class="card-meta">
                                    <span>{$article.created_at|date_format:"%B %e, %Y"}</span>
                                </div>
                                <h3><a href="/article/{$article.id}">{$article.title}</a></h3>
                                <p>{$article.description|truncate:100}</p>
                                <a href="/article/{$article.id}" class="read-more">Read More</a>
                            </div>
                        </article>
                    {/foreach}
                </div>
            </section>
        {/if}
    {/foreach}
{/block}
