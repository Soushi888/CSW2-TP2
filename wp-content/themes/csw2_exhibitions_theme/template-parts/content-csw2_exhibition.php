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
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="csw2-entry-content">
        <?php csw2_exhibitions_post_thumbnail(); ?>
        <div class="csw2-entry-content-text">
            <p><strong><?php echo the_terms(get_the_id(), 'csw2_author'); ?></strong>
                <br>
                <?php
                foreach (get_the_terms(get_the_id(), 'csw2_genre') as $term) :
                    echo $term->name . ', ';
                endforeach;
                ?>
                publié le
                <?php
                $date_publication =  get_post_meta(get_the_id(), 'date publication', true);
                echo date("d/m/Y", strtotime($date_publication));
                ?>
                <br>
                <?php
                $original_language = get_the_terms(get_the_id(), 'csw2_original_language');
                ?>
                Langue d'origine: <?php echo mb_strtolower($original_language[0]->name, 'UTF-8'); ?>
            </p>
            <?php the_content(); ?>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->