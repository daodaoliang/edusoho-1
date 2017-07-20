<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2017/3/27
 * Time: 上午2:05
 */

require_once 'vendor/autoload.php';
require_once 'config.php';

use Qiniu\Auth;

$bucket = Config::BUCKET_NAME;
$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;

$auth = new Auth($accessKey, $secretKey);
$upToken = $auth->uploadToken($bucket);

$ret = array('uptoken' => $upToken);

echo json_encode($ret);
