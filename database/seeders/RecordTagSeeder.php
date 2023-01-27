<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $in = [];
        for( $record = 1; $record<=50;$record++){
        for( $i = 1; $i<=5;$i++){
            $in = [
                'record_id' => $record,
                'tag_id' => rand(0,50)
            ];
        }
        }
        DB::table('record_tag')->insert($in);
    }
}
