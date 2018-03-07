<?php
if ( ! is_active_sidebar( 'header-top-bar-left' ) && ! is_active_sidebar( 'header-top-bar-right' ) ) {
  return;
}
?>
<div class="header__top-bar">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="top-bar__content">
          <?php if ( is_active_sidebar( 'header-top-bar-left' ) ) : ?>
            <div class="top-bar__left">
              <?php dynamic_sidebar( 'header-top-bar-left' ); ?>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'header-top-bar-right' ) ) : ?>
            <div class="top-bar__right">
              <?php dynamic_sidebar( 'header-top-bar-right' ); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>