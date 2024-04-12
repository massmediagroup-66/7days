<?php

namespace App\Command;

use Domain\Post\PostGeneratorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateSummaryPostCommand extends Command
{
    protected static $defaultName = 'app:generate-summary-post';
    protected static $defaultDescription = 'Run app:generate-summary-post';

    private PostGeneratorInterface $postGenerator;

    public function __construct(PostGeneratorInterface $postGenerator, string $name = null)
    {
        parent::__construct($name);
        $this->postGenerator = $postGenerator;
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->postGenerator->generateSummaryPost();

        $output->writeln('A summary post has been generated.');

        return Command::SUCCESS;
    }
}
