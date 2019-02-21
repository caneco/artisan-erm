<?php

return [

  'list' => [
    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Cache commands
    |--------------------------------------------------------------------------
    */
    'cache' => [
      'clear'  => 'Flush the application cache',
      'forget' => 'Remove an item from the cache',
      'table'  => 'Create a migration for the cache database table',
    ],

    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Config commands
    |--------------------------------------------------------------------------
    */
    'config' => [
      'cache' => 'Create a cache file for faster configuration loading',
      'clear' => 'Remove the configuration cache file',
    ],

    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Migrate commands
    |--------------------------------------------------------------------------
    */
    'migrate' => [
      'fresh'    => 'Drop all tables and re-run all migrations',
      'install'  => 'Create the migration repository',
      'refresh'  => 'Reset and re-run all migrations',
      'reset'    => 'Rollback all database migrations',
      'rollback' => 'Rollback the last database migration',
      'status'   => 'Show the status of each migration',
    ],

    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Queue commands
    |--------------------------------------------------------------------------
    */
    'queue' => [
      'failed'       => 'List all of the failed queue jobs',
      'flush'        => 'Flush all of the failed queue jobs',
      'forget'       => 'Delete a failed queue job',
      'listen'       => 'Listen to a given queue',
      'restart'      => 'Restart queue worker daemons after their current job',
      'retry'        => 'Retry a failed queue job',
      'work'         => 'Start processing jobs on the queue as a daemon',
      'failed-table' => 'Create a migration for the failed queue jobs database table',
      'table'        => 'Create a migration for the queue jobs database table',
    ],

    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Route commands
    |--------------------------------------------------------------------------
    */
    'route' => [
      'cache' => 'Create a route cache file for faster route registration',
      'clear' => 'Remove the route cache file',
      'list'  => 'List all registered routes',
    ],

    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Schedule commands
    |--------------------------------------------------------------------------
    */
    'schedule' => [
      'finish' => 'Handle the completion of a scheduled command',
      'run'    => 'Run the scheduled commands',
    ],

    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of View commands
    |--------------------------------------------------------------------------
    */
    'view' => [
      'cache' => 'Compile all of the application\'s Blade templates',
      'clear' => 'Clear all compiled view files',
    ],

    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Make commands
    |--------------------------------------------------------------------------
    */
    'make' => [
      'auth'         => 'Scaffold basic login and registration views and routes',
      'channel'      => 'Create a new channel class',
      'command'      => 'Create a new Artisan command',
      'controller'   => 'Create a new controller class',
      'event'        => 'Create a new event class',
      'exception'    => 'Create a new custom exception class',
      'factory'      => 'Create a new model factory',
      'job'          => 'Create a new job class',
      'listener'     => 'Create a new event listener class',
      'mail'         => 'Create a new email class',
      'middleware'   => 'Create a new middleware class',
      'migration'    => 'Create a new migration file',
      'model'        => 'Create a new Eloquent model class',
      'notification' => 'Create a new notification class',
      'observer'     => 'Create a new observer class',
      'policy'       => 'Create a new policy class',
      'provider'     => 'Create a new service provider class',
      'request'      => 'Create a new form request class',
      'resource'     => 'Create a new resource',
      'rule'         => 'Create a new validation rule',
      'seeder'       => 'Create a new seeder class',
      'test'         => 'Create a new test class',
    ],
  ],

];
