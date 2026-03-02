<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);

        $file = $request->file('file');
        \Log::info("File info: " . json_encode([
            'originalName' => $file->getClientOriginalName(),
            'size' => $file->getSize(),
            'path' => $file->getPathname(),
        ]));

        // $filePath = $request->file('file')->store('documents', 'public');
        $filePath = $request->file('file')->store('resumes', 's3');
        \Log::info("File stored at: " . $filePath);

        Document::create([
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded!');
    }


    public function download(Document $document)
    {
        // Check if file exists
        if (!Storage::disk('s3')->exists($document->file_path)) {
            abort(404, 'File not found');
        }

        // Generate pre-signed URL (valid for 10 minutes)
        $url = Storage::disk('s3')->temporaryUrl(
            $document->file_path,
            now()->addMinutes(10)
        );

        // Redirect user to the temporary URL
        return redirect($url);
    }

    public function destroy(Document $document)
    {
        // Delete file from storage
        if (\Storage::disk('s3')->exists($document->file_path)) {
            \Storage::disk('s3')->delete($document->file_path);
        }

        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document deleted!');
    }
}
