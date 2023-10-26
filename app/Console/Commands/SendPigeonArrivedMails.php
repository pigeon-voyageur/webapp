<?php

namespace App\Console\Commands;

use App\Mail\PigeonArrivedMail;
use App\Models\PigeonMessage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPigeonArrivedMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-pigeon-arrived-mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to each user if pigeon recently arrived with a message';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        PigeonMessage::recentlyArrived()->each(static function (PigeonMessage $pigeonMessage) {
            Mail::to($pigeonMessage->pigeon->user)->send(new PigeonArrivedMail($pigeonMessage->news));
        });
    }
}
