<?php
 /*
 * Copyright (c) Meta Platforms, Inc. and affiliates.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 */

require __DIR__ . '/vendor/autoload.php';

use FacebookAds\Object\CustomAudience;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = '<ACCESS_TOKEN>';
$app_secret = '<APP_SECRET>';
$app_id = '<APP_ID>';
$id = '<CUSTOM_AUDIENCE_ID>';

$api = Api::init($app_id, $app_secret, $access_token);
$api->setLogger(new CurlLogger());

$fields = array(
);
$params = array(
  'payload' => array('schema' => array('EMAIL','MADID','APPUID','LOOKALIKE_VALUE'),'app_ids' => array('<appID>'),'data' => array(array('b36a83701f1c3191e19722d6f90274bc1b5501fe69ebf33313e440fe4b0fe210','6032d997-3ab0-4de0-aa16-8af0e5b482fb','1234567890','0.9'),array('2b3b2b9ce842ab8b6a6c614cb1f9604bb8a0d502d1af49c526b72b10894e95b5','B67385F8-9A82-4670-8C0A-6F9EA7513F5F','','0'),array('898628e28890f937bdf009391def42879c401a4bcf1b5fd24e738d9f5da8cbbb','','9876543210','0.4'))),
);
echo json_encode((new CustomAudience($id))->createUser(
  $fields,
  $params
)->exportAllData(), JSON_PRETTY_PRINT);