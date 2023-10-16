{{-- <!DOCTYPE html>
<html>
<head>
    <title>Web Crawler</title>
</head>
<body>
    <h1>Web Crawler</h1>
    <form method="post" action="{{ route('crawl') }}">
        @csrf
        <input type="text" name="url" placeholder="URLを入力してください" required>
        @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">実行</button>
    </form>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Web Crawler</title>
</head>
<body>
    <h1>Web Crawler</h1>
    <form method="post" action="{{ route('crawl') }}">
        @csrf
        <div>
            <label for="url">URL:</label>
            <input type="text" name="url" id="url" placeholder="URLを入力してください" required>
        </div>
        <div>
            <label for="keywords">Keywords:</label>
            <input type="text" name="keywords" id="keywords" placeholder="Enter Keywords" required>
        </div>
        <button type="submit">実行</button>
    </form>
</body>
</html>
