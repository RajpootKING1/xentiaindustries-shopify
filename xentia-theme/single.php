<?php
/**
 * Single Post Template
 * 
 * @package XentiaTheme
 */

get_header();

while (have_posts()) : the_post();
?>

<section class="py-16 bg-titanium border-b border-xgold/20">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <span class="badge-pill-gold mb-3"><?php echo get_the_date(); ?></span>
        <h1 class="font-cinzel text-3xl sm:text-4xl font-bold text-white uppercase mt-2">
            <?php the_title(); ?>
        </h1>
    </div>
</section>

<section class="py-16 bg-obsidian text-xsilver">
    <div class="max-w-4xl mx-auto px-6 glass-card p-8 sm:p-12 rounded-2xl">
        <div class="prose prose-invert max-w-none text-sm leading-relaxed space-y-6">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php
endwhile;
get_footer();
