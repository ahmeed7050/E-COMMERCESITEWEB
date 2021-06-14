<?php
session_start();

use App\Connection;
use App\Modele\Panier;
use App\Table\PostTable;
use App\Table\PanierTable;

if (!isset($_SESSION['id']))
    header('location: ' . $router->url('connexion'));
else {
    $id = $params['id'];

    $pdo = Connection::getPDO();
    $post = (new PostTable($pdo))->find($id);
    $p = new Panier($_SESSION['id'], $post->getName(), $post->getcontent());

    $panierTable = new PanierTable($pdo);
    $panierTable->add($p);
    header('Location: ' . $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) . '?panier=1');
}
