<?php

namespace App\Modele;

use App\Helpers\Text;
use \DateTime;

class Panier
{
    private $clientId;
    private $namePost;
    private $content;
    private $created_at;

    public function __construct($clientId, $namePost, $content)
    {
        $this->clientId = $clientId;
        $this->namePost = $namePost;
        $this->content = $content;
        $this->created_at = date('Y-m-d H:i:s');
    }
    public function getNamePost(): ?string
    {
        return $this->namePost;
    }
    public function setNamePost(string $namePost): self
    {
        $this->namePost = $namePost;
        return $this;
    }

    public function getcontent(): ?string
    {
        return $this->content;
    }


    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getFormattedContent(): ?string
    {
        return nl2br(e($this->content));
    }
    public function getExcerpt(): ?string
    {
        if ($this->content === null) {
            return null;
        }
        return nl2br(htmlentities(Text::excerpt($this->content, 60)));
    }

    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }
    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * Get the value of clientId
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set the value of clientId
     *
     * @return  self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }
}
