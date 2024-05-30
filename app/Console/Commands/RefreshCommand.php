<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * @return int|void
     */
    public function handle()
    {
        if (app()->isProduction()) {
            return Command::FAILURE;
        }

        $this->call('cache:clear');

        $this->call('migrate:fresh', ['--seed' => true]);
    }
}
