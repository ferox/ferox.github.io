<?php

namespace App\Support;

class PageLanguage
{
    public static function code(mixed $page = null): string
    {
        $language = null;

        if (is_object($page) && method_exists($page, 'data')) {
            $language = $page->data('language');
        }

        if (! is_string($language) || $language === '') {
            return config('hyde.language', 'en');
        }

        return $language;
    }

    public static function isPortuguese(mixed $page = null): bool
    {
        return str_starts_with(strtolower(self::code($page)), 'pt');
    }

    public static function badge(mixed $page = null): string
    {
        return self::isPortuguese($page) ? 'PT-BR' : 'EN';
    }

    public static function text(mixed $page, string $key): string
    {
        $locale = self::isPortuguese($page) ? 'pt-BR' : 'en';

        $translations = [
            'en' => [
                'article' => 'Article',
                'post_header' => 'Post header',
                'about_post' => 'About the post',
                'article_body' => 'Article body',
                'by' => 'By',
                'filed_under' => 'Filed under',
                'read_post' => 'Read post',
            ],
            'pt-BR' => [
                'article' => 'Artigo',
                'post_header' => 'Cabecalho do post',
                'about_post' => 'Sobre o post',
                'article_body' => 'Conteudo do artigo',
                'by' => 'Por',
                'filed_under' => 'Categoria',
                'read_post' => 'Ler post',
            ],
        ];

        return $translations[$locale][$key] ?? $translations['en'][$key] ?? $key;
    }
}
