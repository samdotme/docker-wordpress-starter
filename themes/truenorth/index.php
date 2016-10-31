<?php include('header.php'); ?>

    <navigation>
      <div class="row">
        <div class="small-12 large-5 columns text-center">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php bloginfo('template_url') ?>/images/true-north-topeka-logo-no-tagline.svg" alt="TrueNorth Topeka Church Ministries in Topeka, KS"></a>
        </div>
        <div class="small-12 large-7 columns text-center">
          <?php
          $menu_params = array(
            'theme_location'  => 'top-menu',
            'menu'            => 'Top Bar Menu',
            'container'       => 'div',
            'depth'           => 0,
            'items_wrap'      => '<ul class="navigation-menu">%3$s</ul>'
          );

          wp_nav_menu($menu_params);
           ?>
           <img class="hamburger-menu-icon" src="<?php bloginfo('template_url') ?>/images/hamburger_menu.svg">
        </div>
      </div>
    </navigation>
    <div class="container">
      <section>
        <div class="row">
          <div class="small-12 columns">
            <?php if ( have_posts() ) : ?>
            	<?php while ( have_posts() ) : the_post(); ?>
                <?php if ( has_post_thumbnail() ) {
                  	$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), full )[0];
                  }
                  ?>
                <h1 style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.4)), url(<?= $thumbnail_url ?>)"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            	<?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </section>
    </div>
<?php include('footer.php'); ?>
