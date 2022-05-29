<?php
include_once "../base.php";

$Form->q("UPDATE form SET `is_deleted`='1' WHERE `id`={$_POST['id']}");
?>