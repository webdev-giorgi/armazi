<?php
define('PRODUCTION', TRUE);
define('WEBSITE_VERSION', '1.7.8');
define('START_TIME', microtime(TRUE));
define('START_MEMORY', memory_get_usage());

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
 $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 header('HTTP/1.1 301 Moved Permanently');
 header('Location: ' . $location);
 exit;
}

require_once '_manager/bootstrap.php';


// Administration
if ($storage->adminslug == c('admin.slug'))
{
    $route = array('main','show',1);
    for ($i=0; $i<=count($storage->segments); $i++) {
        if (!empty($storage->segments[$i+1]))
            $route[$i] = $storage->segments[$i+1];
    }
    $storage->route = $route;
    unset($storage->segments, $route);
    require_once DIR . CMS . '/class.manager.php';
    require_once DIR . WEBSITE . '/class.manager.php';
    file_exists(DIR . WEBSITE . '/functions.php') AND require_once DIR . WEBSITE . '/functions.php';
    $manager = new Manager();
    if ($storage->route[0] !== 'manager' AND in_array($storage->route[0], array_map('strtolower', get_class_methods('Manager'))))
        call_user_func(array($manager, $storage->route[0]));
    exit($manager);
}

// Website
ob_start(c('output.buffering')) AND header('Content-Type: text/html; charset=' . c('output.charset'));
$storage->section = db_fetch('SELECT * FROM '.c('table.pages').' WHERE language = \'' . l() . '\' AND deleted = 0 AND visibility = 1 AND id = ' . current_id() . ' LIMIT 1;');

if(isset($storage->section['redirectlink']) && $storage->section['redirectlink']!=""){
    header('Location: '. $storage->section['redirectlink']);
    exit;
}

$page_types = c('section.types');
$storage->page_type = $page_types[empty($storage->section) ? 999 : $storage->section['category']];
if ($storage->page_type === 'error') {
    header('HTTP/1.0 404 Not Found');
    $storage->section = array('id' => 0, 'title' => l('404'));
}

if (!isset($_SESSION['csrftoken']))
{
    $_SESSION['csrftoken'] = rand_string(21, true);
}

/* REDIRECT TO OLD start
$actual_link = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(
    preg_match(
        "/https:\/\/batumi-marathon\.com\/ge|https:\/\/batumi-marathon\.com\/index\.php|https:\/\/batumi-marathon\.com\/index\.html/", 
        $actual_link
    )
){
    header('Location: https://batumi-marathon.com/old/');
}
 REDIRECT TO OLD end */

require_once DIR . CMS . '/class.pages.php';
require_once DIR . WEBSITE . '/class.pages.php';
file_exists(DIR . WEBSITE . '/functions.php') AND require_once DIR . WEBSITE . '/functions.php';

if ($storage->page_type !== 'pages' AND in_array($storage->page_type, array_map('strtolower', get_class_methods('Pages')))){
    call_user_func(array(new Pages(), $storage->page_type));
}


if(!isset($_GET["ajax"]))
	require_once WEBSITE . '/content.php';
else
    require_once WEBSITE . '/ajax.php';
$storage->memory_usage = number_format((memory_get_peak_usage() - START_MEMORY) / 1024, 2) . ' KB';
$storage->execution_time = number_format(microtime(TRUE) - START_TIME, 5) . ' seconds';
PRODUCTION OR trace($storage, 'Storage');
exit();