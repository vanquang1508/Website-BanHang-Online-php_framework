<?php

use Illuminate\Database\Seeder;

class UserTableCustomer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
            [
                'first_name'=> 'super',
                'last_name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin'),
                'level'=>0,
                'postal_address'=>'14 Doan uan',
                'physical_address'=>'15 doan uan',
            ]
        ];
        DB::table('customers')->insert($data);
    }
}
