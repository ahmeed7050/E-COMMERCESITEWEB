<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Auth;

Auth::check();
$pdo = Connection::getPDO();
(new CategoryTable($pdo))->delete($params['id']);

header('Location: ' . $router->url('admin_categories') . '?delete=1');
