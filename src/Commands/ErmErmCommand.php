<?php

namespace Caneco\ArtisanErm\Commands;

use Caneco\ArtisanErm\Alias;
use Caneco\ArtisanErm\Erm;
use Illuminate\Console\Command;

class ErmErmCommand extends Command
{
    private $prefix;

    public static function create(string $prefix)
    {
        $self = new self;
        $self->setPrefix($prefix);
        $self->setName("erm:{$prefix}");
        $self->setDescription("Erm...show all the commands in the `$prefix` namespace.");

        return $self;
    }

    public function handle()
    {
        $prefix = $this->getPrefix();

        $commands = Erm::from($prefix);

        $maxlength = max(array_map('strlen', array_keys($commands)));

        foreach ($commands as $command => $description) {
            $spacer  = str_repeat(' ', $maxlength - strlen($command) + 2);
            $list[] = "<info>artisan {$prefix}:{$command}</info>{$spacer}{$description}";
        }

        $call = $this->choice('Erm...which command would you like to call', $list ?? []);

        $this->call(
            Erm::pluckCommand($call)
        );
    }

    private function setPrefix(string $name)
    {
        $this->prefix = $name;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }
}
