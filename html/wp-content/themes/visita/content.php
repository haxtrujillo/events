<?php
/**
 * Visita -  main template for displaying content
 *
 * @file content.php
 * @package visita
 * @author Hafid Trujillo
 * @copyright 2010-2020 Xpark Media
 * @license license.txt
 * @version release: 0.1.0
 * @filesource  wp-content/themes/visita/content.php
 * @since available since 0.1.0
 */
 ?>

 <article <?php visita_post_schema(); ?> <?php post_class(); ?>>

  <?php if ( has_post_thumbnail() ) : ?>
    <figure id="entry-media-<?php the_ID()?>" class="hmedia">
      <a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>" class="image url enclosure">
        <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'photo' ) ); ?>
      </a>
      <meta class="image" itemprop="image" content="<?php the_post_thumbnail_url()?>" />
      <figcaption class="fn"><?php the_title_attribute(); ?></figcaption>
    </figure>
  <?php endif; // has_post_thumbnail() ?>

  <header id="entry-header-<?php the_ID()?>" class="entry-header<?php if ( ! is_single() ) echo ' float' ?>">
    <?php edit_post_link( __( 'Edit', 'visita' ), '<span class="edit-link">', '</span>' ); ?>
    <?php
      printf(
        '<%3$s itemprop="name" class="entry-title">
          <a href="%1$s" itemprop="url" class="url" title="%4$s" rel="bookmark">%2$s</a>
        </%3$s>',
        get_permalink(),
        esc_html( get_the_title() ),
        esc_attr( is_single( ) ? 'h1' : 'h3' ),
        esc_attr( sprintf( __( 'Link to %s', 'visita' ), the_title_attribute( 'echo=0' ) ) )
      )
    ?>
    <div class="entry-meta hidden">
      <?php visita_get_post_date(); ?>
      <span itemprop="author" class="author vcard hidden"><em class="fn"><?php bloginfo('name') ?></em></span>
      <?php if (is_single()) visita_entry_tax( $post ) ?>
    </div><!-- .entry-meta -->
  </header><!-- .entry-header -->

  <?php if ( is_single() ) : ?>
    <div itemprop="description" class="entry-content">
      <?php visita_get_description(); ?>
      <?php the_content( __( 'Continue <span class="meta-nav">&rarr;</span>', 'visita' ) ); ?>
    </div><!-- .entry-content -->
  <?php endif; // is_single() ?>

  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="offers">
    <?php //visita_entry_dates(); ?>
  </div>

  <?php if (is_single()) visita_get_performers(); ?>

 </article><!-- .post-<?php the_ID(); ?> -->
