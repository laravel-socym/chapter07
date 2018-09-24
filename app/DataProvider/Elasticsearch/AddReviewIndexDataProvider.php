<?php
declare(strict_types=1);

namespace App\DataProvider\Elasticsearch;

use App\DataProvider\AddReviewIndexProviderInterface;
use App\Foundation\ElasticsearchClient;

class AddReviewIndexDataProvider implements AddReviewIndexProviderInterface
{
    private $client;

    /**
     * ReviewIndexDataProvider constructor.
     *
     * @param ElasticsearchClient $client
     */
    public function __construct(ElasticsearchClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int    $id
     * @param string $title
     * @param string $content
     * @param string $epoch
     * @param array  $tags
     * @param int    $userId
     *
     * @return array
     */
    public function addReview(
        int $id,
        string $title,
        string $content,
        string $epoch,
        array $tags,
        int $userId
    ): array {
        $params = [
            'index' => 'reviews_2018',
            'type'  => 'reviews',
            'id'    => sprintf('review:%s', $id),
            'body'  => [
                'review_id'  => $id,
                'title'      => $title,
                'content'    => $content,
                'tags'       => array_map(function (string $value) {
                    return ['tag_name' => $value];
                }, $tags),
                'user_id'    => $userId,
                'created_at' => $epoch
            ]
        ];

        return $this->client->client()
            ->index($params);
    }
}
