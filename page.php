<?php get_header(); ?>

<main class="main_article_post" role="main">
    <article class="web_post_wrapper">
        <div class="web_post_inner pageWp">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <section class="post_wrapper itpage">
                        <header class="post_header">
                            <h1 class="post_title"><?php the_title(); ?></h1>
                        </header>
                        <div class="post_content">
                            <?php the_content(); ?>
                        </div>
                    </section>
                <?php endwhile; ?>
            <?php else: ?>
                <section class="no_posts_found">
                    <p><?php esc_html_e('Nothing here yet. Why not publish your first post?', 'webdescode'); ?></p>
                </section>
            <?php endif; ?>
        </div>
    </article>

    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>