<?php

/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package csw2_exhibitions
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php $multiple = true;
    csw2_exhibitions_post_thumbnail($multiple); ?>

    <div class="csw2-entry-content">
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php echo get_permalink(get_the_id()); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo the_terms(get_the_id(), 'csw2_artist'); ?>
                <br>
                <?php
                foreach (get_the_terms(get_the_id(), 'csw2_theme') as $term) :
                    echo $term->name . ', ';
                endforeach;
                ?>
                <?php
                $place =  get_post_meta(get_the_id(), 'place', true);
                echo $place;
                ?>
            </p>
        </header><!-- .entry-header -->
        <p><?php the_excerpt(); ?></p>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->