<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppVersioning extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'version:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and update app\'s version via git.';

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
     * @return void
     */
    public function handle()
    {
        $versionFile = 'config/version.php';
        $hash_version = str_replace("\n",'',shell_exec('git describe --tags'));
        $version = explode('-', $hash_version);

        $count = count($version);

        $p0 = $version[0];
        $p1 = ( $count >=2 ) ? $version[1] : '';
        $p2 = ( $count >=3 ) ? $version[2] : '';

        $array = var_export(
            array(
                'app' => $p0,
                'build' =>  $p1,
                'hash' => $p2,
                'full' => $hash_version),
            true);

        // Construct our file content
        $content = <<<CON
<?php
return $array;
CON;
        // And finally write the file and output the current version
        \File::put($versionFile, $content);
        $this->line('Setting version: '. $p0 .' build '. $p1.' ('.$p2.')');
    }
}