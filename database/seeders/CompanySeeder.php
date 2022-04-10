<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert(
            [
                0 => [
                    'name' => 'Tan Cheong',
                    'email' => 'tancheong@gmail.com',
                    'website' => 'www.tancheong.com.my',
                ],
                1 => [
                    'name' => 'Company1',
                    'email' => 'Company1@gmail.com',
                    'website' => 'www.Company1.com.my',
                ],
                2 => [
                    'name' => 'Company2',
                    'email' => 'Company2@gmail.com',
                    'website' => 'www.Company2.com.my',
                ],
                3 => [
                    'name' => 'Company3',
                    'email' => 'Company3@gmail.com',
                    'website' => 'www.Company3.com.my',
                ],
                4 => [
                    'name' => 'Company4',
                    'email' => 'Company4@gmail.com',
                    'website' => 'www.Company4.com.my',
                ],
                5 => [
                    'name' => 'Company5',
                    'email' => 'Company5@gmail.com',
                    'website' => 'www.Company5.com.my',
                ],
                6 => [
                    'name' => 'Company6',
                    'email' => 'Company6@gmail.com',
                    'website' => 'www.Company6.com.my',
                ],
                7 => [
                    'name' => 'Company7',
                    'email' => 'Company7@gmail.com',
                    'website' => 'www.Company7.com.my',
                ],
                8 => [
                    'name' => 'Company8',
                    'email' => 'Company8@gmail.com',
                    'website' => 'www.Company8.com.my',
                ],
                9 => [
                    'name' => 'Company9',
                    'email' => 'Company9@gmail.com',
                    'website' => 'www.Company9.com.my',
                ],
                10 => [
                    'name' => 'Company10',
                    'email' => 'Company10@gmail.com',
                    'website' => 'www.Company10.com.my',
                ],
                11 => [
                    'name' => 'Company11',
                    'email' => 'Company11@gmail.com',
                    'website' => 'www.Company11.com.my',
                ],
                12 => [
                    'name' => 'Company12',
                    'email' => 'Company12@gmail.com',
                    'website' => 'www.Company12.com.my',
                ],
            ]
        );
    }
}
