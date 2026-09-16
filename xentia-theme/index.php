<?php
/**
 * Main Index Fallback Template
 * 
 * @package XentiaTheme
 */

if (is_front_page() || is_home()) {
    include(get_template_directory() . '/front-page.php');
    return;
}

get_header();
?>

<section class="py-16 bg-titanium border-b border-xgold/20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <span class="badge-pill-gold mb-2">XENTIA INDUSTRIES</span>
        <h1 class="font-cinzel text-3xl sm:text-5xl font-bold text-white uppercase mt-2">
            LATEST <span class="gold-gradient-text">UPDATES & INSIGHTS</span>
        </h1>
    </div>
</section>

<section class="py-16 bg-obsidian text-xsilver">
    <div class="max-w-7xl mx-auto px-6">
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="glass-card p-6 rounded-xl flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] text-xgold uppercase font-montserrat tracking-wider block mb-2"><?php echo get_the_date(); ?></span>
                            <h3 class="font-cinzel text-lg font-bold text-white mb-3 hover:text-xgold transition">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-xs text-xsilver line-clamp-3 mb-4"><?php echo get_the_excerpt(); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-xs font-bold text-xgold hover:text-white transition flex items-center gap-2">
                            READ ARTICLE <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p class="text-center text-xsilver py-12">No posts available.</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();