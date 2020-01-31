<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DebayashisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new SplFileObject('database/csv/debayashis.csv');
        $file->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        $list = [];
        $now = Carbon::now();
        foreach($file as $index => $line) {
            if ($index == 0)  {
                continue;
            }

            $list[] = [
                "id" => $index,
                "name" => $line[2],
                "artist_name" => $line[1],
                "created_at" => $now,
                "updated_at" => $now,
            ];
        }

        DB::table("debayashis")->insert($list);
    }
}
