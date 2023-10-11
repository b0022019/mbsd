{{-- <!DOCTYPE html>
<html>
<head>
    <title>Web Crawler</title>
</head>
<body>
    <h1>Web Crawler</h1>
    <form method="post" action="{{ route('crawl') }}">
        @csrf
        <input type="text" name="url" placeholder="Enter URL">
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
        <input type="text" name="url" placeholder="Enter URL" required>
        @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">実行</button>
    </form>
</body>
</html>

