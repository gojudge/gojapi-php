<?php
include_once 'gojapi.php';

$jdg = new Judger("duguying.net", 1005, "123456789");

$response = $jdg->add_task(12, 'C', 'int main(void){return 0;}', 'assert', 'null');
echo "[add task]\n";
echo print_r($response), "\n";

echo "[get status]\n";
$response = $jdg->get_status(12);
echo print_r($response), "\n";
