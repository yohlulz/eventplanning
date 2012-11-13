<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
    <rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
      <channel>
        <title><?php echo $title; ?></title>
        <description><?php $description; ?></description>
        <link><?php echo site_url(); ?>/</link>
        <language>en</language>
        <copyright><?php echo $copyright; ?></copyright>
        <pubDate><?php echo $date; ?></pubDate>
        <?php echo $items; ?>
      </channel>
    </rss>