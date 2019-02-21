<?php

namespace Caneco\ArtisanErm;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class Erm
{
    public static function list(): array
    {
        return array_keys(
            Config::get('erm.list', [])
        );
    }

    public static function from(string $name): array
    {
        return Config::get("erm.list.{$name}", []);
    }

    public static function discover(): bool
    {
        $list = self::parseArtisanCommands();

        return file_put_contents(
            config_path('erm.php'),
            '<?php return ' . var_export(compact('list'), true) . ';' . PHP_EOL
        );
    }

    public static function parseArtisanCommands()
    {
        $commands = Artisan::all();

        foreach ($commands as $signature => $command) {
            [$prefix, $handle] = explode(':', "{$signature}:");
            if (! empty($handle)) {
                $list[$prefix][$handle] = $command->getDescription();
            }
        }

        return array_filter($list??[], function ($entry) {
            return count($entry) > 1;
        });
    }

    public static function pluckNamespace(string $value): ?string
    {
        preg_match('/^artisan\s(?<q>[a-z0-9]+):_\s.*/i', strip_tags("{$value} "), $matches);

        return $matches['q'] ?? null;
    }

    public static function pluckCommand(string $value): ?string
    {
        preg_match('/^artisan\s(?<q>[a-z0-9]+:[a-z0-9]+)\s.*/i', strip_tags("{$value} "), $matches);

        return $matches['q'] ?? null;
    }
}
