<?php
// Tiny Crews — removed from the site (case study commented out in /case-studies/data.php).
// Original page logic preserved below, commented out, not deleted.
http_response_code(404);
require dirname(__DIR__, 2) . '/404.php';
return;
/*
$slug = 'tiny-crews';
require dirname(__DIR__) . '/data.php';
require dirname(__DIR__, 2) . '/templates/case-study.php';
*/
