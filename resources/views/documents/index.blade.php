<!DOCTYPE html>
<html>
<head>
    <title>Document Upload CRUD</title>
</head>
<body>
    <h1>Documents</h1>

    <a href="{{ route('documents.create') }}">Upload New Document</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Title</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        @foreach($documents as $doc)
        <tr>
            <td>{{ $doc->title }}</td>
            <td>
                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">View File</a>
            </td>
            <td>
                <form action="{{ route('documents.destroy', $doc->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>