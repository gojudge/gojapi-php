<?php
include_once 'gojapi.php';

$jdg = new Judger("duguying.net", 1005, "123456789");
$jdg->add_task(12, 'C', 'int main(){ printf("hello");return 0;}', 'assert', 'null');

