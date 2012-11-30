<?php
require_once 'RawPhp.php';

$template = new RawPhp();

$template->assign("greeting", "Hello World!");

$template->display("tests/grandChild.php");
?>