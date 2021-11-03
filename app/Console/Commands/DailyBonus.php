<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DailyBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily package bonus';

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
        //return Command::SUCCESS;


        // Setting up a random word
        //$key = array_rand($quotes);
        //$data = $quotes[$key];

        $users = User::with('packages')->get()->toArray();
        dd($users);
        foreach ($users as $user) {
            Mail::raw("{$key} -> {$data}", function ($mail) use ($user) {
                $mail->from('digamber@positronx.com');
                $mail->to($user->email)
                    ->subject('Daily New Quote!');
            });
        }

        $this->info('Successfully added daily bonus.');

    }
}
