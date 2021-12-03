<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExpiredCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status jadwal';

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
        $this->$tanggal = \DB::table('learns')->where('status', 'Soon')->whereDate('tanggal' ,'<', now())->update(['status' => 'Expired']);
        $this->info('success.');
        //DB::table('task')->whereDate('endDate', '<', now())->update(['status' => 'expired']);
        
    }
}
