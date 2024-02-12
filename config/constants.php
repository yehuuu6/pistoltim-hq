<?php

if (!defined('FILE_ACCESS')) {
    header("HTTP/1.1 403 Forbidden");
    include($_SERVER['DOCUMENT_ROOT'] . '/errors/403.php');
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load($_SERVER['DOCUMENT_ROOT'] . '/.env');

// Meta Data
define('DEFAULT_PAGE_TITLE', "Pistol Tim HQ");
define('DEFAULT_PAGE_DESCRIPTION', "Pistol Tim merkez üssünde Efe Karadaş'ın doğum gününü kutlamak için toplanmış bulunmaktayız.");
define('DEFAULT_PAGE_KEYWORDS', "pistoltim, pistol, tim, pistol tim, kaan efe karadas, dogum gunu");
define('DEFAULT_PAGE_AUTHOR', "therenaydin");
define('DEFAULT_PAGE_FAVICON', "{$_ENV["DOMAIN"]}/public/favicon.png");
