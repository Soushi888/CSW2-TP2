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
                <br>
                <?php
                $date_debut =  get_post_meta(get_the_id(), 'Date de début', true);
                echo "Date de début : $date_debut"; ?>
                <br>
                <?php
                $date_fin =  get_post_meta(get_the_id(), 'Date de fin', true);
                echo "Date de fin : $date_fin";
                ?>  
            </p>
            <?php the_excerpt(); ?>
        </div>
</article><!-- #post-<?php the_ID(); ?> -->
<hr>