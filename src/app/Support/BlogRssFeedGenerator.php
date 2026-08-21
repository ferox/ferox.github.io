<?php

namespace App\Support;

use Hyde\Framework\Features\XmlGenerators\RssFeedGenerator;
use Hyde\Pages\MarkdownPost;

class BlogRssFeedGenerator extends RssFeedGenerator
{
    public function generate(): static
    {
        BlogPosts::listed()->each(function (MarkdownPost $post): void {
            $this->addItem($post);
        });

        return $this;
    }
}
