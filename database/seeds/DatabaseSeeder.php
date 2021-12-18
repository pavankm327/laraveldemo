<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// $this->call(UsersTableSeeder::class);
        /* DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]); */
		
		$branch_name = ['Mangaluru','Puttur','Udupi','Manipal','Bengaluru','Mysore'];
		$branch_code = ['14523','45698','26897','75698','87564','96542'];
		$account_type = ['Savings','Current'];
		
		for($i=0;$i<10;$i++){
			DB::table('accounts')->insert([
				'name' => Str::random(10),
				'email' => Str::random(10).'@gmail.com',
				'phone_no'=>mt_rand(7000000000, 9999999999),
				'branch_name'=>Arr::random($branch_name),
				'branch_code'=>Arr::random($branch_code),
				'account_type'=>Arr::random($account_type),
				'balance'=>mt_rand(0, 1000000),
				'address'=>Arr::random($branch_name)
			]);
		}
		
    }
}