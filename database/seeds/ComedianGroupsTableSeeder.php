<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Debayashi;

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

        $now = Carbon::now();

        foreach($file as $index => $line) {
            $list = [];

            if ($index == 0)  {
                continue;
            }

            $list = [
                'name' => $line[0],
                'created_at' => $now,
                'updated_at' => $now,
            ];

            // 出囃子データに登録されている場合
            if (isset($line[1]) || isset($line[2])) {
                $where = [
                    'artist_name' => $line[1],
                    'name' => $line[2],
                ];
                $Debayashi = Debayashi::where($where)->get()->first();

                $list['debayashi_id'] = $Debayashi->id;
            }

            DB::table("comedian_groups")->insert($list);
        }
    }
}
