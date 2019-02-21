<?php

namespace Caneco\ArtisanErm\Commands;

use Caneco\ArtisanErm\Erm;
use Illuminate\Console\Command;

class ErmCommand extends Command
{
    protected $signature = 'erm
                            {--discover : Erm...rebuilds the list according to your artisan}';

    protected $description = 'Erm...awkwardly run that artisan command';

    public function handle()
    {
        if ($this->option('discover')) {
            return $this->discoverList();
        }

        return $this->ermHandle();
    }

    private function discoverList()
    {
        if (Erm::discover()) {
            $this->warn('Erm...list rebuilded successfully.');
        }
    }

    private function ermHandle()
    {
        foreach (Erm::list() as $prefix) {
            $list[] = "<info>artisan</info> {$prefix}:_";
        }

        $call = $this->choice('Erm...which command would you like to call', $list);

        $this->call(
            'erm:' . Erm::pluckNamespace($call)
        );
    }
}
