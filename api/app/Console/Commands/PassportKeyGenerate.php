<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PassportKeyGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secret:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate passport id and secret';

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
     * @return int
     */
    public function handle()
    {
        echo $this->description."\n";

        Artisan::call('passport:client', ['--password' => true, '--no-interaction' => true]);

        preg_match('/Client ID: (\d+)\s+Client secret: (\w+)/', Artisan::output(), $matches);

        $this->putEnv('PASSPORT_CLIENT_ID', $matches[1]);
        $this->putEnv('PASSPORT_CLIENT_SECRET', $matches[2]);

        return 0;
    }

    private function putEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}
