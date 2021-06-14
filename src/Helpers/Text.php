<?php
namespace App\Helpers;

class Text{

    public static function excerpt(string $content, $limit = 60)
    {
        if (mb_strlen($content) <= 60) {
            return $content;
        }
        $lastSpace = mb_strpos($content, ' ', $limit);//chercher le première espace depuis notre limit
        return substr($content, 0, $lastSpace) . '...';
    }
}
