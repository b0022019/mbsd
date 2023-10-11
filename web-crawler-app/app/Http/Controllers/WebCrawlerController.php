<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\BrowserKit\HttpBrowser;
use App\Models\WebPage;

class WebCrawlerController extends Controller
{
    public function index()
    {
        return view('crawler');
    }

    public function crawl(Request $request) {
        $validated = $request->validate([
            'url' => 'required|url', // URLが必須であることと、有効なURLであることをバリデーション
        ]);

        $url = $request->input('url');
        $client = new HttpBrowser();
        $crawler = $client->request('GET', $url);
        $content = $crawler->filter('body')->html();

        // クロールしたデータをデータベースに保存
        $post = WebPage::create([
            'url' => $url,
            'content' => $content,
        ]);

        return view('crawler_result', compact('url', 'content'));
    }
}
