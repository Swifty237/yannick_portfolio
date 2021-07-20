<?php

require_once '../../functions/main-functions.php';

$db->exec("DELETE FROM comments WHERE id = {$_POST['id']}");