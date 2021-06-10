<?php

use Illuminate\Database\Seeder;

class BookSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        	'book_name' => 'C#',
        	'book_price' => 500,
        ]);
    }
}
