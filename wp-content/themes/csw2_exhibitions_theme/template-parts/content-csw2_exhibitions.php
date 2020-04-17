<?php

/**
 * Template part for displaying page content in single-csw2_exhibition.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package csw2_exhibitions
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </a>
    </header><!-- .entry-header -->

    <div class="csw2-entry-content">
        <?php $multiple = true;
        csw2_exhibitions_post_thumbnail($multiple); ?>
        <div class="csw2-entry-content-text">
            <p><?php echo "Artiste : ";
                echo the_terms(get_the_id(), 'csw2_artist'); ?>
                <br>
                <?php
                foreach (get_the_terms(get_the_id(), 'csw2_theme') as $term) :
                    echo "Thème : {$term->name}";
                endforeach;
                ?>
                <br>
                <?php
                foreach (get_the_terms(get_the_id(), 'csw2_place') as $term) :
                    echo "Lieux : {$term->name}";
                endforeach;
                ?>
            </p>
            <?php the_content(); ?>
        </div>
    </div><!-- .entry-content -->

</article>