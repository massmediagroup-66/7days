<?php

namespace Domain\Post;

use App\Entity\Post;
use DateTime;
use joshtronic\LoremIpsum;

class PostGenerator
{
    private const COUNT_PARAGRAPHS_RANDOM_POST = 2;
    private const COUNT_PARAGRAPHS_SUMMARY_POST = 1;

    private PostManager $postManager;
    private LoremIpsum $loremIpsum;

    public function __construct(
        PostManager $postManager,
        LoremIpsum $loremIpsum
    ) {
        $this->postManager = $postManager;
        $this->loremIpsum = $loremIpsum;
    }

    public function generateRandomPost(): Post
    {
        $title = $this->loremIpsum->words(mt_rand(4, 6));
        $content = $this->loremIpsum->paragraphs(self::COUNT_PARAGRAPHS_RANDOM_POST);

        return $this->postManager->addPost($title, $content);
    }

    public function generateSummaryPost(): Post
    {
        $date = new DateTime();

        // we want to publish this post at midnight
        // it's summary at the end of day
        // so, if this method will be run little bit after the midnight
        // we should correct the data
        if ($date->format('H') < 6) {
            $date->modify('-1 day');
        }

        $title = sprintf('Summary %s', $date->format('Y-m-d'));
        $content = $this->loremIpsum->paragraphs(self::COUNT_PARAGRAPHS_SUMMARY_POST);

        return $this->postManager->addPost($title, $content);
    }
}
