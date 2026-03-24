<?php
header('Content-Type: application/xml; charset=utf-8');
$base = 'https://www.abroadsewa.com.np';
$today = date('Y-m-d');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url><loc><?= $base ?>/</loc><lastmod><?= $today ?></lastmod><priority>1.0</priority></url>
  <url><loc><?= $base ?>/about</loc><lastmod><?= $today ?></lastmod><priority>0.8</priority></url>
  <url><loc><?= $base ?>/services</loc><lastmod><?= $today ?></lastmod><priority>0.9</priority></url>
  <url><loc><?= $base ?>/destinations</loc><lastmod><?= $today ?></lastmod><priority>0.9</priority></url>
  <url><loc><?= $base ?>/destinations/japan</loc><lastmod><?= $today ?></lastmod><priority>0.9</priority></url>
  <url><loc><?= $base ?>/destinations/australia</loc><lastmod><?= $today ?></lastmod><priority>0.7</priority></url>
  <url><loc><?= $base ?>/destinations/canada</loc><lastmod><?= $today ?></lastmod><priority>0.7</priority></url>
  <url><loc><?= $base ?>/destinations/uk</loc><lastmod><?= $today ?></lastmod><priority>0.7</priority></url>
  <url><loc><?= $base ?>/destinations/korea</loc><lastmod><?= $today ?></lastmod><priority>0.7</priority></url>
  <url><loc><?= $base ?>/testimonials</loc><lastmod><?= $today ?></lastmod><priority>0.8</priority></url>
  <url><loc><?= $base ?>/contact</loc><lastmod><?= $today ?></lastmod><priority>0.8</priority></url>
</urlset>
