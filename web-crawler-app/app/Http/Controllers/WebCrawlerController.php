<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\BrowserKit\HttpBrowser;

class WebCrawlerController extends Controller
{
    public function index()
    {
        return view('crawler');
    }

    public function crawl(Request $request)
    {
        $url = $request->input('url');
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $content = $crawler->filter('body')->html();

        // クロールしたデータをデータベースに保存
        \App\WebPage::create([
            'url' => $url,
            'content' => $content,
        ]);

        return view('crawler_result', compact('url', 'content'));
    }
}
