<?php

namespace App\Support;

use Hyde\Foundation\Kernel\PageCollection;
use Hyde\Pages\MarkdownPost;

class BlogPosts
{
    /** @return PageCollection<MarkdownPost> */
    public static function listed(): PageCollection
    {
        return MarkdownPost::getLatestPosts()->filter(function (MarkdownPost $post): bool {
            return $post->matter('type') === 'blog';
        });
    }

    /** @return PageCollection<MarkdownPost> */
    public static function listedByLanguage(string $language): PageCollection
    {
        return self::listed()->filter(function (MarkdownPost $post) use ($language): bool {
            return strtolower(PageLanguage::code($post)) === strtolower($language);
        });
    }
}
