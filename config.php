<?php

$bot_token       = getenv('BOT_TOKEN');
$bot_username    = getenv('BOT_USERNAME');
$bot_private_key = getenv('BOT_PRIVATE_KEY');
$bot_public_key  = getenv('BOT_PUBLIC_KEY');  
$hmac_secret     = getenv('HMAC_SECRET');
$files_dir_name  = getenv('FILES_DIR_NAME');
$base_dir_name   = getenv('BASE_DIR');
$base_url        = 'https://' . $_SERVER['SERVER_NAME'] . $base_dir_name;
$files_base_url  = $base_url . '/' . $files_dir_name;
$files_dir       = $_SERVER['DOCUMENT_ROOT'] . '/' . $files_dir_name;

// Heroku app case
if ($bot_token !== false && $bot_private_key !== false && $hmac_secret !== false && $bot_username !== false)
{
    list($bot_id, $token) = explode(':', BOT_TOKEN, 2);
    
    // Define variables
    define('BOT_ID', $bot_id);
    define('BOT_TOKEN', $bot_token);
    define('BOT_USERNAME', $bot_username);
    define('BOT_PUBLIC_KEY', $bot_public_key);
    define('BOT_PRIVATE_KEY', $bot_private_key);
    define('HMAC_SECRET', $bot_public_key);
    define('BASE_URL', $base_url);
    define('FILES_BASE_URL', $files_base_url);
    define('FILES_DIR', $files_dir);
    unset($bot_id);
    unset($bot_username);
    unset($bot_token);
}

define('BOT_TOKEN',       'XXXXXXXX:XXXXXXXXXXXXXXXXXXXXXXXX');   // place bot token of your bot here, KEEP IT SECRET!
define('BOT_USERNAME',    'XXXXXXXXXX');                          // place username of your bot here
list($bot_id, $token) = explode(':', BOT_TOKEN, 2);
define('BOT_ID', $bot_id);
unset($bot_id);
unset($token);

define('BOT_PUBLIC_KEY',  '-----BEGIN PUBLIC KEY----- ...');      // place public key of your bot here
define('BOT_PRIVATE_KEY', '-----BEGIN RSA PRIVATE KEY----- ...'); // place private key of your bot here, KEEP IT SECRET!

define('HMAC_SECRET',     'XXXXXXXXXXXXXXXXXXXXXXXX');            // some random string for hmac secret

define('BASE_URL',        'https://example.com/passport/');       // place base url of your example page
define('FILES_BASE_URL',  'https://example.com/files/');          // place base url of saved files
define('FILES_DIR',       '/var/www/files/');                     // place dir where files are located

$MC = new Memcache;
$MC->connect('localhost', 11211);