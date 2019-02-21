<?php

namespace Caneco\ArtisanErm\Tests\Functional;

use Caneco\ArtisanErm\ArtisanErmServiceProvider;
use Orchestra\Testbench\TestCase;
use Symfony\Component\Console\Exception\CommandNotFoundException;

class AliasCommandTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ArtisanErmServiceProvider::class,
        ];
    }

    /** @test */
    public function artisan_erm_can_follow_clear_cache_command()
    {
        $this->artisan('erm')
            ->expectsQuestion('Erm...which command would you like to call', '<info>artisan</info> cache:_')
            ->expectsQuestion('Erm...which command would you like to call', '<info>artisan cache:clear</info>')
            ->expectsOutput('Application cache cleared!')
            ->assertExitCode(0);
    }

    /** @test */
    public function artisan_erm_cache_can_follow_clear_cache_command()
    {
        $this->artisan('erm:cache')
            ->expectsQuestion('Erm...which command would you like to call', '<info>artisan cache:clear</info>')
            ->expectsOutput('Application cache cleared!')
            ->assertExitCode(0);
    }

    /** @test */
    public function artisan_erm_discover_updates_config_file()
    {
        $this->artisan('erm', ['--discover' => true])
            ->expectsOutput('Erm...list rebuilded successfully.')
            ->assertExitCode(0);
    }
}
