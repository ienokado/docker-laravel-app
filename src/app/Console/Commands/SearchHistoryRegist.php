<?php

namespace App\Console\Commands;

use App\Models\ComedianGroup;
use App\Models\SearchHistory;
use Illuminate\Console\Command;

class SearchHistoryRegist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:search_history_regist {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'キーワード検索でヒットした芸人の出囃子をDBに登録する';

    /**
     * date
     *
     * @var string
     */
    protected $date;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 指定された日付 or 昨日分のログを取得
        $this->date = $this->argument('date') ? $this->argument('date') : date('Y-m-d', strtotime('-1 day'));
        // 件数カウント
        $count = 0;

        $data = $this->parseLogFile();
        // 検索ログカウント
        $logCount = count($data);

        foreach ($data as $value) {
            $comedianGroup = ComedianGroup::where('name', $value['request'])->first();
            if ($comedianGroup) {
                try {
                    SearchHistory::create([
                        'keyword' => $value['request'],
                        'debayashi_id' => $comedianGroup->debayashi ? $comedianGroup->debayashi->id : null,
                        'comedian_group_id' => $comedianGroup->id,
                        'user_agent' => $value['user-agent'],
                        'ip_address' => $value['ip'],
                        'searched_at' => $value['searched_at'],
                    ]);
                    $count++;
                } catch (\Exception $e) {
                    \Log::channel('slack')->info('keyword: ' . $value['request'] . '/ip: ' . $value['ip'], $e);
                }
            }
        }

        // ロギング
        \Log::channel('slack')->info("履歴日: " . $this->date . "/検索履歴件数: ${logCount}件/履歴登録件数: ${count}件");
    }

    /**
     * parse log file
     *
     * @return array
     */
    private function parseLogFile()
    {
        $log = [];

        $fileName = "request-" . $this->date . ".log";
        $logFile = storage_path("logs/${fileName}");

        if (file_exists($logFile)) {
            foreach (array_reverse(file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)) as $line) {
                if (preg_match_all('/\[.*?\]|{.*?}/', $line, $matches)) {
                    $jsonData = json_decode($matches[0][1], true);
                    $jsonData['searched_at'] = str_replace(['[', ']'], '', $matches[0][0]);
                    $log[] = $jsonData;
                }
            }
        }

        return $log;
    }
}
