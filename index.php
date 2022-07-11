<?php
include 'vendor/autoload.php';

$q 	= 'q=bot&from_recent_search=true&sort=recency';
$url 	= "https://www.upwork.com/ab/feed/jobs/rss?{$q}";

$rssInstance 	= new \blackout314\awe\RSSParser();
$upwork 	= new \blackout314\awe\Upwork($url, $rssInstance); 
$upwork->run();


