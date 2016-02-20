<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\MessageJob;

class SendMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails.send {--m|message=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to subscribers';

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
        //
        $m = new MessageJob;
        $result = $m->broadcast($this->option('message'));
        if($result)
        {
            $this->info('Broadcast message success, detail subscribers sends :');

            $this->table(['name','email'],$result);

        }
    }
}
