<?php

namespace Domain\Post;

use App\Entity\Post;

interface PostManagerInterface
{
    public function addPost($title, $content): Post;
}
