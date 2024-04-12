<?php

namespace Domain\Post;

use App\Entity\Post;

interface PostGeneratorInterface
{
    public function generateRandomPost(): Post;
    public function generateSummaryPost(): Post;
}
