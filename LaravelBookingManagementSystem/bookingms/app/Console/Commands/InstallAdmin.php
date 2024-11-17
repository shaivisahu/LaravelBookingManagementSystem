<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class InstallAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install System Admin';

    /**
     * Execute the console command.
     * @return int
     */
    public function handle()
    {
        $user = new User([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone_no'=>'9679845679',
            'password'=>Hash::make('secret'),
            'user_type'=>1
        ]);
        if($user->save()){
            $this->info('Account Created Successfully');
        }else{
            $this->info('Account Creation Failed');
        }
    }
}
