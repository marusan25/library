<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("books")->insert([
            "id" => 1,
            "isbn" => 9784295017936,
            "title" => "スッキリわかるJava入門 第4版",
            "author" => "中山 清喬,国本 大悟,フレアリンク",
            "publisher" => "インプレス",
            "amount" => 2970,
            "thumbnail_path" => "http://books.google.com/books/content?id=NpbgEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api",
            "description" => "シリーズ累計90万部突破の大人気入門書の改訂版！ 学習中にぶつかる「なぜ」「どうして」を解消しながら進む解説で、 難所のオブジェクト指向もスッキリわかって、楽々マスターできる！ 「なぜ」「どうして」が必ずわかる秘密は、3つのコンセプトにあり！ 【1】手軽に・つまずかずに、Javaをはじめられる プログラミング学習最初の難関「開発環境の準備」でつまずかないよう、スマホやPCのWebブラウザでプログラミングができる「dokojava」※を用意しています。 プログラミング中によく起きるトラブルには、巻末の「エラー解決・虎の巻」で対策できます。 【2】「オブジェクト指向」の難所も楽々越えられる、スッキリ流解説！ スッキリ流解説によって、まだ腑に落ちていないのに次の項目に進むということがなく、「オブジェクト指向」も一歩一歩着実に理解を深めて、無駄なく短期間で知識を習得できます。 【3】実務で役立つ基礎と要点をひととおりマスターできる 資格取得用の学習はもちろん、開発実務で求められる幅広い基礎知識と重要ポイントを、ひととおり獲得できる構成となっています。 第4版では、Java21を基準に加筆・修正を行ったほか、令和の学習体験により適した、シンプルでスッキリとした紙面デザインへ全面的にリニューアルし、読みやすさ、使い勝手の向上を図っています。 本書でぜひ、Javaプロフェッショナルへの第一歩を踏みだしてください! ※dokojavaは新刊購入者用特典です。利用の前にインプレスのWebサイトで「dokojavaご利用上の注意」をご確認ください。 発行：インプレス",
        ]);
    }
}
