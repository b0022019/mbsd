<!DOCTYPE html>
<html>
<head>
    <title>Web Crawler</title>
</head>
<body>
    <h1>Web Crawler</h1>
    <form method="post" action="{{ route('crawl') }}">
        @csrf
        <input type="text" name="url" placeholder="Enter URL">
        <button type="submit">Crawl</button>
    </form>
</body>
</html>
