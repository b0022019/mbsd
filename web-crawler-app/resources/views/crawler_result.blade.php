{{-- <!DOCTYPE html>
<html>
<head>
    <title>Crawled Page</title>
</head>
<body>
    <h1>Crawled Page</h1>
    <p>URL: {{ $url }}</p>
    <div>
        {!! $content !!}
    </div>
</body>
</html> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Crawl Result</title>
</head>
<body>
    <h1>Crawl Result</h1>
    
    <table>
        <thead>
            <table width="100%" border="1">
            <tr>
                <th>Title</th>
                <th>Keyword</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pageData['title'] }}</td>
                <td>
                    <ul>
                        @foreach ($pageData['keywords'] as $keyword)
                            @if (!empty($keyword))
                                <li>{{ $keyword }}</li>
                            @endif
                        @endforeach
                    </ul>
                </td>
                <td>{{ $pageData['url'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
