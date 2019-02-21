<?php

namespace Caneco\ArtisanErm;

use Caneco\ArtisanErm\Erm;
use Caneco\ArtisanErm\Commands\ErmCommand;
use Caneco\ArtisanErm\Commands\ErmErmCommand;
use Illuminate\Support\ServiceProvider;

class ArtisanErmServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
            $this->registerCommands();
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/erm.php', 'erm'
        );
    }

    private function registerCommands(): void
    {
        $this->commands(ErmCommand::class);

        foreach (Erm::list() as $prefix) {
            $this->app->bind(
                $list[] = "command.erm:{$prefix}",
                function () use ($prefix) {
                    return ErmErmCommand::create($prefix);
                }
            );
        }

        $this->commands($list ?? []);
    }

    private function registerPublishing(): void
    {
        $this->publishes([
            __DIR__.'/../config/erm.php' => config_path('erm.php'),
        ], 'config');
    }
}
