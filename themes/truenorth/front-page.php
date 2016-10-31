<?php include('header.php'); ?>
    <div id="home-container">
      <section id="main-home" class="margin-2rem-top margin-2rem-bottom">
        <div class="row">
          <div class="small-12 columns text-center">
            <img src="<?php bloginfo('template_url') ?>/images/true-north-topeka-logo-no-tagline.svg" alt="TrueNorth Topeka Church Ministries in Topeka, KS">
            <h1 class="front-page hide-for-small-only">Absolute Truth. Absolutely Jesus.</h1>
          </div>
        </div>
      </section>
      <section>
        <div id="home-navigation" class="row">
          <?php
          $menu_params = array(
            'theme_location'  => 'home-menu',
            'menu'            => 'Front Page Menu',
            'container'       => 'container',
            'depth'           => 0,
            'items_wrap'      => '<div data-equalizer>%3$s</div>',
            'walker'          => new description_walker(),
          );

          wp_nav_menu($menu_params);
           ?>
        </div>
      </section>
      <section>
        <div class="row margin-2rem-top">
          <div class="small-12 columns text-center">
            <?php if ( have_posts() ) : ?>
            	<?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            	<?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </section>
    </div>
<?php include('footer.php'); ?>
