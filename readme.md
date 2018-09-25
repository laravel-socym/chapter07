# 第二部 Chapter 7 / 処理の分離
 
## 対応表
 
 - [リスト7.1.3.1：PublishProcessorクラス](app/Events/PublishProcessor.php)
 - [リスト7.1.3.3：イベントの登録方法](app/Providers/EventServiceProvider.php)
 - [リスト7.1.3.5：トップディレクトリへのアクセス時にイベントを発行する例](routes/web.php)
 - [リスト7.1.4.1：イベント発火キャンセル](app/Service/Order.php)
 - [リスト7.1.5.2：MessageQueueSubscriber 非同期リスナークラス](app/Listeners/MessageQueueSubscriber.php)
 - [リスト7.1.5.3：イベントを追加登録](app/Providers/EventServiceProvider.php)
 
 - [リスト7.2.4.2：Knp\Snappy\Pdfクラスをサービスプロバイダへ登録](app/Providers/AppServiceProvider.php)
 - [リスト7.2.4.4：PDFファイル出力Jobクラス実装例](app/Jobs/PdfGenerator.php)
 
 - [リスト7.3.3.2：reviewsテーブルマイグレーションクラス](database/migrations/2018_07_14_231646_create_reviews_table.php)
 - [リスト7.3.3.3：tagsテーブルマイグレーションクラス](database/migrations/2018_07_14_231651_create_tags_table.php)
 - [リスト7.3.3.4：review_tagsマイグレーションクラス](database/migrations/2018_07_14_235815_create_review_tags_table.php)
 - [リスト7.3.3.5：データベースシーダ作成例](database/seeds/DatabaseSeeder.php)
 - [リスト7.3.3.9：ReviewRegisteredクラスの実装コード](app/Events/ReviewRegistered.php)
 - [リスト7.3.4.1：口コミ登録処理インターフェース](app/DataProvider/RegisterReviewProviderInterface.php)
 - [リスト7.3.4.2：口コミ登録処理のみを受け持つクラス](app/DataProvider/Database/RegisterReviewDataProvider.php)
 - [リスト7.3.6.2：ElasticsearchClientクラス実装例](app/Foundation/ElasticsearchClient.php)
 - [リスト7.3.6.3：elasticsearch/elasticsearch利用のための設定値記入例](config/elasticsearch.php)
 - [リスト7.3.6.4：ElasticsearchClientクラスのインスタンス生成方法定義例](app/Providers/AppServiceProvider.php)
 - [リスト7.3.6.5：Elasticsearch index操作クラス](app/DataProvider/Elasticsearch/AddReviewIndexDataProvider.php)
 - [リスト7.3.6.6：AddReviewIndexProviderInterfaceを利用するListenerクラス](app/Listeners/ReviewIndexCreator.php)
 - [リスト7.3.7.4：Elasticsearchを使ったQuery実装](app/DataProvider/Elasticsearch/ReadReviewDataProvider.php)
 
## For Docker

### setup 

```bash
$ docker-compose up -d
$ docker-compose run composer install --prefer-dist --no-interaction && composer app-setup
$ docker-compose exec php-fpm php artisan migrate
$ docker-compose exec php-fpm php artisan db:seed
$ curl -XPUT 'http://localhost:9200/reviews' -H 'Content-Type: application/json' -d @schema/mapping.json
```

#### コンテナのキャッシュが残っている場合

```bash
$ docker-compose build --no-cache
```

### Queue

```bash
$ docker-compose exec php-fpm php artisan queue:work
```

### MySQL確認方法

```bash
$ docker-compose exec mysql bash
```

dockerのmysqlコンテナ内で以下を実行します

```bash
# mysql -u homestead -p homestead
```
