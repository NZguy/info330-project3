<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use common\base\Http;
use common\session\Session;
use i330p3\SessionKVs;

$action = Http::getGetParamValue("action");
if ($action == "get") {
    echo json_encode(Session::get(SessionKVs::CAR_BOOKMARK_ARRAY));
    exit;
} else if ($action == "set") {
    $data = Http::getGetParamValue("data");
    if (is_null($data)) {
        echo "U did it wrong inside set";
        exit;
    }
    Session::set(SessionKVs::CAR_BOOKMARK_ARRAY, json_decode($data));
    exit;
}

echo "wat u did it wrong";
