<!DOCTYPE html>
<html>
<head>
    <title>Upload Document</title>
</head>
<body>
    <h1>Upload New Document</h1>

    <a href="{{ route('documents.index') }}">Back to List</a>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Select File (PNG, JPG, JPEG, PDF):</label><br>
        <input type="file" name="file" required><br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>