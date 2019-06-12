<?php
/**
 * The template part for top header
 *
 * @package VW Landing Page 
 * @subpackage vw_landing_page
 * @since VW Landing Page 1.0
 */
?>

<div id="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <?php dynamic_sidebar('social-links'); ?>
      </div>
      <div class="col-lg-2 col-md-2">
        <?php if( get_theme_mod( 'vw_landing_page_phone') != '') { ?>
          <div class="top-margin">
            <i class="fas fa-phone"></i><span><?php echo esc_html(get_theme_mod('vw_landing_page_phone',''));?></span>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-3">
        <?php if( get_theme_mod( 'vw_landing_page_email') != '') { ?>
          <div class="top-margin">
            <i class="far fa-envelope"></i><span><?php echo esc_html(get_theme_mod('vw_landing_page_email',''));?></span>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="top-btn">
          <?php if( get_theme_mod( 'vw_landing_page_topbtn_text') != '' || get_theme_mod( 'vw_landing_page_topbtn_url') != '') { ?>
            <a href="<?php echo esc_html(get_theme_mod('vw_landing_page_topbtn_url',''));?>"><?php echo esc_html(get_theme_mod('vw_landing_page_topbtn_text',''));?></a>
          <?php }?>
        </div>
      </div>
    </div>  
  </div>
</div>