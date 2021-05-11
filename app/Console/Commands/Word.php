<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;

class Word extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi công việc cho tất cả mọi người';

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
        $words = [
            \App\Models\Word::all()
        ];

        // Finding a random word
        $key = array_rand($words);
        $value = $words[$key];

        $users = User::all();
        foreach ($users as $user) {
            Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                $mail->from('info@tutsforweb.com');
                $mail->to($user->email)
                    ->subject('Công việc hôm nay');
            });
        }

        $this->info('Đã gửi công việc hôm nay cho tất cả người dùng');
    }
}
