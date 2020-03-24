<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = $this->parseLogFile();

        return view('admin.log.index', [
            'logs' => $logs,
        ]);
    }

    /**
     * parse log file
     *
     * @return array
     */
    private function parseLogFile()
    {
        $log = [];

        // 30日分のログを取得する
        // TODO: 量が多い場合レスポンスが遅くなるので、改良予定
        for ($i = 0; $i < 30; $i++) {
            $fileName = 'request-' . date('Y-m-d', strtotime("-${i} day")) . '.log';
            $logFile = storage_path("logs/${fileName}");

            if (file_exists($logFile)) {
                foreach (array_reverse(file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)) as $line) {
                    $log[] = $line;
                }
            }
        }

        return $log;
    }
}
