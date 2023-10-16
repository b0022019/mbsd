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

    public function crawl(Request $request)
    {
        // フォームからURLとキーワードを取得
        $url = $request->input('url');
        $keywords = explode(',', $request->input('keywords')); // カンマ区切りのキーワードを配列に分割

        // ウェブページをクロールしてデータを抽出
        $pageData = $this->crawlWebPage($url, $keywords);

        // クロール結果をビューに渡して表示
        return view('crawler_result', compact('pageData'));
    }

    private function crawlWebPage($url, $keywords)
    {
        $client = new HttpBrowser();
        $crawler = $client->request('GET', $url); // 指定したURLからウェブページを取得

        // タイトルを取得
        $title = $crawler->filter('title')->text();

        // ページの本文を取得
        $content = $crawler->filter('body')->text();

        // キーワードが含まれるかチェック
        $keywordsFound = [];
        foreach ($keywords as $keyword) {
            if (stripos($content, $keyword) !== false) {
                $keywordsFound[] = $keyword;
            }
        }

        // クロール結果を配列にまとめて返す
        $pageData = [
            'url' => $url,
            'title' => $title,
            'keywords' => $keywordsFound,
        ];

        return $pageData;

        // クロールしたページからリンクを取得し、リンク先を再帰的にクロール
        $this->crawlLinks($crawler, $keywords);

            return view('crawler_result', compact('webPage'));
    }
            
        private function findKeywords($keywords, $content)
        {
            // キーワードが存在するかチェックして見つかったキーワードを返すロジック
            // キーワードをカンマで分割し、配列に格納
            $keywordsArray = explode(',', $keywords);

            $foundKeywords = [];

            foreach ($keywordsArray as $keyword) {
                // キーワードをトリミングして前後のスペースを削除
                $keyword = trim($keyword);

                // キーワードがコンテンツ内で見つかるかどうかをチェック
                if (stripos($content, $keyword) !== false) {
                    $foundKeywords[] = $keyword;
                }
            }

            return $foundKeywords;
        }
            
        private function crawlLinks($crawler, $keywords)
        {
            // ページ内のリンクを取得して再帰的にクロールするロジック
            $crawler->filter('a')->links()->each(function ($link) use ($keywords) {
                $url = $link->getUri();
        
                // ドメインフィルタリング: 特定のドメインのみクロールする場合
                // 例: if (parse_url($url, PHP_URL_HOST) === 'targetdomain.com')
        
                // クロール済みのURLかどうかチェック
                $webPage = WebPage::where('url', $url)->first();
        
                if (!$webPage) {
                    // 新しいページをクロール
                    $client = new Client();
                    $newCrawler = $client->request('GET', $url);
        
                    $title = $newCrawler->filter('title')->text();
                    $content = $newCrawler->filter('body')->text();
        
                    $keywordsFound = $this->findKeywords($keywords, $content);
        
                    // クロール結果をデータベースに保存
                    WebPage::create([
                        'url' => $url,
                        'title' => $title,
                        'keywords' => $keywordsFound,
                    ]);
        
                    // 再帰的にリンクをクロール
                    $this->crawlLinks($newCrawler, $keywords);
                }
            });
        }

}

