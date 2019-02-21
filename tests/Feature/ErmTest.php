<?php

namespace Caneco\ArtisanAliases\Tests\Feature;

use Caneco\ArtisanAliases\Exceptions\AliasException;
use Caneco\ArtisanErm\Erm;
use Caneco\ArtisanErm\Tests\Support\MockedCommand;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Framework\TestCase;

class ErmTest extends TestCase
{
    public function setUp()
    {
        Artisan::shouldReceive('all')
            ->andReturn([
                'one:two' => new MockedCommand('One Two'),
                'two:one' => new MockedCommand('Teo One'),
                'two:two' => new MockedCommand('Two Two'),
                'six' => new MockedCommand('Six'),
            ]);
    }

    /** @test */
    public function parsing_of_artisan_commands_group_namespaces_of_two()
    {
        $commands = Erm::parseArtisanCommands();

        $this->assertEquals(
            '{"two":{"one":"Teo One","two":"Two Two"}}',
            json_encode($commands)
        );
    }

    /** @test */
    public function choice_plucks_namespace_correctly()
    {
        $pluck = Erm::pluckNamespace('artisan foo:_');

        $this->assertEquals('foo', $pluck);
    }

    /** @test */
    public function choice_plucks_command_correctly()
    {
        $pluck = Erm::pluckCommand('artisan foo:bar');

        $this->assertEquals('foo:bar', $pluck);
    }
}
