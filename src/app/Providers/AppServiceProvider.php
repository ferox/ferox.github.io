<?php

namespace App\Providers;

use App\Support\BlogRssFeedGenerator;
use Desilva\Microserve\Response;
use Hyde\RealtimeCompiler\RealtimeCompiler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! $this->app->bound(RealtimeCompiler::class)) {
            return;
        }

        $this->app->make(RealtimeCompiler::class)->registerVirtualRoute('/feed.xml', function (): Response {
            $body = BlogRssFeedGenerator::make();

            return (new Response(200, 'OK', [
                'body' => $body,
            ]))->withHeaders([
                'Content-Type' => 'application/rss+xml; charset=UTF-8',
                'Content-Length' => (string) strlen($body),
            ]);
        });
    }
}
