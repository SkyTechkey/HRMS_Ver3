<?php

namespace App\Console\Commands;

use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new post';

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
        DB::table('tbl_posts')->insert([
            'title' => 'Dương Văn Nhiều',
            'content' => 'Day la noi dung bai viet',
            'publish' => 1,
            'created_at' => Carbon::now()
            
        ]);
    }
}
