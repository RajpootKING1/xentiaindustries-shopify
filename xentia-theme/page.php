<?php
/**
 * Default Page Template
 * 
 * @package XentiaTheme
 */

get_header();

while (have_posts()) : the_post();
?>

<section class="py-16 bg-titanium border-b border-xgold/20">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h1 class="font-cinzel text-3xl sm:text-4xl font-bold text-white uppercase mt-2">
            <?php the_title(); ?>
        </h1>
    </div>
</section>

<section class="py-16 bg-obsidian text-xsilver min-h-[50vh]">
    <div class="max-w-5xl mx-auto px-6">
        <div class="glass-card p-8 sm:p-12 rounded-2xl">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php
endwhile;
get_footer();
