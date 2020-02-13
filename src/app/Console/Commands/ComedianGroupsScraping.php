<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class ComedianGroupsScraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:comedian_groups_scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comedian Groups Scraping from Wiki Command';

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
        $goutte = GoutteFacade::request('GET', 'https://ja.wikipedia.org/wiki/%E6%BC%AB%E6%89%8D%E5%B8%AB%E4%B8%80%E8%A6%A7');

        $filePath = database_path('csv/comedian_groups.csv');

        // 既にファイルがある場合は一旦削除
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $fp = fopen($filePath, 'w');

        fputcsv($fp, ['芸人名']);

        $goutte->filter('#bodyContent')->filter('h3 + ul')->each(function ($ul) use ($fp) {
            $ul->filter('li')->each(function ($li) use ($fp) {
                if (count($li->filter('a')) !== 0) {
                    $title = $this->trimName($li->filter('a')->attr('title'));
                    fputcsv($fp, [$title]);
                }
            });
        });

        fclose($fp);
    }

    private function trimName($title)
    {
        // 不要な文字列
        $search = [
            ' (お笑いコンビ)',
            ' (お笑い)',
            ' (存在しないページ)',
        ];

        return str_replace($search, '', $title);
    }
}
