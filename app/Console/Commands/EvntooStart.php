<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class EvntooStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'evntoo:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migration and passport installed successfully';

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

        try {
            if ($this->confirm('Do you want install migration to continue? [yes|no]'))
            {

                $this->output->progressStart(20);

                for ($i = 0; $i < 20; $i++) {
                    sleep(2);
            
                    $this->output->progressAdvance();
                }
                Artisan::call('migrate:fresh --seed');
                $this->info('migration installed successfully');

                
            }
            if ($this->confirm('Do you want install passport to continue? [yes|no]'))
            {
                Artisan::call('passport:install');
                $this->info('passport installed successfully');
            }
            
        } catch (\Throwable $th) {
            $this->error('Something went wrong!');
            $this->info($th);
        }
    
        $this->output->progressFinish();

    }
}
