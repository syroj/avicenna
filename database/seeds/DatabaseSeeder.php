<?php

use Illuminate\Database\Seeder;
use App\User as user;
use App\category as category;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data=[
        [
          'name'=>'Syrojuddin Hadi',
          'username'=>'syroj',
          'email'=>'mail.syroj@gmail.com',
          'password'=>bcrypt('@#!@2008'),
          'phone'=>'0857-1449-2283',
          'address'=>'Jakarta',
        ],
        [
          'name'=>'Ali Machfud',
          'username'=>'Ali',
          'email'=>'mail.Avicenna@gmail.com',
          'password'=>bcrypt('rahasia'),
          'phone'=>'021',
          'address'=>'Jakarta',
        ],
          [
            'name'=>'Iqbal',
            'username'=>'iqbal',
            'email'=>'mail.Avicenna@gmail.com',
            'password'=>bcrypt('rahasia'),
            'phone'=>'021',
            'address'=>'Jakarta',
          ],
          [
            'name'=>'Administrator',
            'username'=>'admin',
            'email'=>'mail.Avicenna@gmail.com',
            'password'=>bcrypt('rahasia'),
            'phone'=>'021',
            'address'=>'Jakarta',
            ]

      ];
      $category=[
        ['category'=> 'Buku Kedokteran'],
        ['category'=> 'Buku Keperawatan'],
        ['category'=> 'Buku Kesmas'],
        ['category'=> 'Buku Farmasi'],
        ['category'=> 'Alat Kesehatan'],

      ];
      category::insert($category);
      user::insert($data);

    }
}
