<?php
  $site_title = get_bloginfo('title');
  $site_description = get_bloginfo('description');
  $html_title = ($site_description != '') ? $site_title . ' | ' . $site_description : $site_title;
?>


<!doctype html>
<html>
  <head>
    <title><?= $html_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
  </head>
  <body>
