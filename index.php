<?php 
require_once('vendor/autoload.php');
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

include('klaviyo-download.php');

$now = new DateTime();
$back = $now->sub(DateInterval::createFromDateString('30 days'));
// echo $back->format('U');

getMetrics($back->format('U'));


?>