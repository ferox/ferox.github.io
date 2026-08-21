<?php

namespace App\Actions;

use App\Support\BlogRssFeedGenerator;
use Hyde\Framework\Concerns\InteractsWithDirectories;
use Hyde\Framework\Features\BuildTasks\PostBuildTask;
use Hyde\Hyde;

use function file_put_contents;

class GenerateRssFeed extends PostBuildTask
{
    use InteractsWithDirectories;

    public static string $message = 'Generating RSS feed';

    protected string $path;

    public function handle(): void
    {
        $this->path = Hyde::sitePath(BlogRssFeedGenerator::getFilename());

        $this->needsParentDirectory($this->path);

        file_put_contents($this->path, BlogRssFeedGenerator::make());
    }

    public function printFinishMessage(): void
    {
        $this->createdSiteFile($this->path)->withExecutionTime();
    }
}
