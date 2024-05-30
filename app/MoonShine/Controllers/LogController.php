<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;

use App\Http\Controllers\Controller;
use App\MoonShine\Resources\LogResource;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

final class LogController extends Controller
{
    public function index(LogResource $resource): View
    {
        $path = storage_path('logs/laravel.log');

        $log = new Logger('laravel');
        $log->pushHandler(new StreamHandler($path, Logger::INFO));

        $formatter = new LineFormatter(allowInlineLineBreaks: true, ignoreEmptyContextAndExtra: true);

        collect($log->getHandlers())
            ->first()
            ->setFormatter($formatter);

        $content = file_get_contents($path);

        $parsed = [];

        foreach (explode(PHP_EOL, $content) as $line) {
            $parsed[] = $this->parseLine(['message' => $line]);
        }

        $page = request('page', 1);

        $logs = new LengthAwarePaginator(
            array_slice($parsed, ($page - 1) * $resource::$itemsPerPage, $resource::$itemsPerPage),
            count($parsed),
            $resource::$itemsPerPage,
            $page,
            ['path' => route('moonshine.logs.index')]
        );

        return view('moonshine.resources.log', [
            'resource' => $resource,
            'items' => $logs
        ]);
    }

    private function parseLine(array $data): array
    {
        $level = $data['level'] ?? Logger::INFO;

        return [
            'message' => $data['message'] ?? '',
            'context' => $data['context'] ?? [],
            'level' => $level,
            'level_name' => Logger::getLevelName($level),
            'channel' => $data['channel'] ?? 'laravel',
            'datetime' => $data['datetime'] ?? now(),
            'extra' => [],
        ];
    }
}
