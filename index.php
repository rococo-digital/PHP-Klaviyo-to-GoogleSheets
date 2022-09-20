<?php 
require_once('vendor/autoload.php');
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

include('klaviyo-download.php');
include('google-sheets-upload.php');

$sheet = new GoogleSheetIntegration();

$sheet->connectToSheet();

$now = new DateTime();
$back = $now->sub(DateInterval::createFromDateString('30 days'));
$data = getMetrics($back->format('U'));

$sheet->updateSheet(json_decode($data, true));
// 

?>