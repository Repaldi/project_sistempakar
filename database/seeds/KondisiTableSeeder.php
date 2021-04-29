<?php

use Illuminate\Database\Seeder;

class KondisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kondisi')->insert(array(
            array(
              
              'nama_kondisi' => 'Pasti ya',
            ),
            array(
              'nama_kondisi' => 'Hampir pasti ya',
            ),
            array(
              
              'nama_kondisi' => 'Kemungkinan besar ya',
            ),
            array(
              'nama_kondisi' => 'Mungkin ya',
            ),
            array(
              
              'nama_kondisi' => 'Tidak tahu',
            ),
            array(
              'nama_kondisi' => 'Mungkin tidak',
            ),
            array(
              
                'nama_kondisi' => 'Kemungkinan besar tidak',
              ),
            array(
            'nama_kondisi' => 'Hampir pasti tidak',
            ),
            array(
              
                'nama_kondisi' => 'Pasti tidak',
              ),
          ));
    }
}
