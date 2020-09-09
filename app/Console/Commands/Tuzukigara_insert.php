<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

class Tuzukigara_insert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tuzukigara_insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tuzukigara_insert';

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
        $data = [
            ['tuzukigara_name' => "父"],
            ['tuzukigara_name' => "母"],
            ['tuzukigara_name' => "息子"],
            ['tuzukigara_name' => "娘"],
            ['tuzukigara_name' => "祖父"],
            ['tuzukigara_name' => "祖母"],

        ];

        DB::table('tuzukigaras')->insert($data);

    }
}
