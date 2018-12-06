<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php 
        if( !is_home() ){
            wp_title(' - ', true, 'right');
        } 
        bloginfo('name'); 
        ?>
        </title>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125058136-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125058136-1');
</script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/atelier-sulphurpool-dark.min.css" type="text/css" />
    <!-- viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
  <?php 
  wp_enqueue_script('jquery');
  wp_enqueue_script('tomdom-script', get_template_directory_uri(). '/js/script.js');
  wp_head(); 
  ?>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  </head>
<body　<?php body_class(); ?>>
    <!-- navigation bar -->
    <nav class="navbar navbar-light navbar-expand-md fixed">
      <?php $logo_url = get_the_logo_url('logo_url'); ?>
      <?php if($logo_url): ?>
      <div class="navbar-brand logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_the_logo_url(); ?>" alt="<?php bloginfo('name'); ?>"/></a></div>
      <?php else: ?>
      <div class="logo"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
      <?php endif; ?>
      <p class="description"><?php bloginfo('description'); ?></p> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav nav-link ">
          <?php
            $args = array(
              'menu' => 'global-navigation', //管理画面で作成したメニューの名前
              'container' => false, //<ul>タグを囲んでいる<div>タグを削除
            );
            wp_nav_menu($args);
            ?>
          </ul> 
        </div>
    </nav>
    