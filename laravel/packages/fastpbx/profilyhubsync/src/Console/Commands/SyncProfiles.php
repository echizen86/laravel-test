<?php

namespace FastPBX\ProfileHubSync\Console\Commands;

use Illuminate\Console\Command;

class SyncProfiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync {synchronizer}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize ProfileHub Profiles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $className = $this->argument('synchronizer');

        if ( !$className ) {
            dump('NoSynchronizerDefined');
            return false;
        }

        $synchronzier = "App\\Jobs\\Synchronizers\\" . $className;
        $synchronzier::dispatch();

    }
}
