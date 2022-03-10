<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Currency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $date = date('Y-m-d');
        $req_url = "https://api.exchangerate.host/{$date}?base=KWD";

        $response=  Http::get($req_url)->json();
   /*     if (@$response['success']) {
            foreach ($response['rates'] as $coin => $value) {


                if ($value && is_numeric($value) && $value > 0)
                    \App\Models\Currency::where('symbol', $coin)->update(['time' => now(), 'price' => $value]);
            }


//        \App\Models\Currency::where('symbol','kwd')->first();
//            dd($response['rates']  ,$response->json());
        }else{

            return 0;
        }*/


    }
}
