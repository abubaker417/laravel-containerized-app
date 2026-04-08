<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EfsTestController extends Controller
{
    private string $efsPath = '/mnt/chroma';

    public function write(): JsonResponse
    {
        $filePath = $this->efsPath . '/test.txt';
        $content  = 'EFS write test at ' . now()->toDateTimeString();

        if (!is_dir($this->efsPath)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'EFS mount path does not exist: ' . $this->efsPath,
            ], 500);
        }

        file_put_contents($filePath, $content);

        return response()->json([
            'status'   => 'ok',
            'message'  => 'Written to EFS successfully',
            'path'     => $filePath,
            'content'  => $content,
        ]);
    }

    public function read(): JsonResponse
    {
        $filePath = $this->efsPath . '/test.txt';

        if (!file_exists($filePath)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'File not found — run /efs/write first',
            ], 404);
        }

        return response()->json([
            'status'  => 'ok',
            'content' => file_get_contents($filePath),
        ]);
    }

    public function health(): JsonResponse
    {
        return response()->json([
            'status'      => 'ok',
            'service'     => 'laravel-chatbot',
            'efs_mounted' => is_dir('/mnt/chroma'),
            'time'        => now()->toDateTimeString(),
        ]);
    }
}
