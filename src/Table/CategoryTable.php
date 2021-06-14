<?php

namespace App\Table;

use App\Modele\Category;
use App\Table\Exception\NotFoundException;
use \PDO;

final class CategoryTable extends Table
{
    protected $table = "category";
    protected $class = Category::class;
    /**
     * @param App\Modele\Post[] $posts
     */
    public function hydratePosts(array $posts): void
    {
        $postById = [];

        foreach ($posts as $post) {
            $postById[$post->getId()] = $post;
        }

        $categories = $this->pdo
            ->query(
                'SELECT c.*, pc.post_id
                        FROM post_category pc 
                        JOIN category c ON c.id = pc.category_id
                        WHERE pc.post_id IN (' . implode(',', array_keys($postById)) . ') '
            )->fetchAll(PDO::FETCH_CLASS, $this->class);

        foreach ($categories as $category) {
            $post->setCategories([]);
            $postById[$category->getPostId()]->addCategory($category);
        }
    }
    public function all(): array
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        return $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
    }
    public function list(): array
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
        $categories = $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
        $results = [];
        foreach ($categories as $category) {
            $results[$category->getId()] = $category->getName();
        }
        return $results;
    }
}
