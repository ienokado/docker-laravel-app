<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComedianGroupsTableSeeder extends Seeder
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
                "id" => ($index + 1),
                "name" => $line[0],
                "debayashi_id" => ($index + 1),
                "created_at" => $now,
                "updated_at" => $now,
            ];
        }

        DB::table("comedian_groups")->insert($list);
    }
}
