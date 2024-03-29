<header id="header-show">
  <div id="header-content-2">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-icon.png" id="header-icon-show">
    <ul class="header-list">
      <li class="header-list-item">TOP</li>
      <li class="header-list-item">PRODUCT</li>
      <li class="header-list-item">ABOUT</li>
      <li class="header-list-item">NEWS</li>
      <li class="header-list-item">CONTACT</li>
    </ul>
  </div>
  <div class="breadcrumbs-container">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display')) {
        bcn_display();
      }?>
    </div>
  </div>
</header>