<?php
declare(strict_types=1);

namespace App\DataProvider\Database;

use App\Events\ReviewRegistered;
use App\DataProvider\RegisterReviewProviderInterface;

/**
 * Class RegisterReviewDataProvider
 */
class RegisterReviewDataProvider implements RegisterReviewProviderInterface
{
    /**
     * @param string $title
     * @param string $content
     * @param int    $userId
     * @param string $createdAt
     * @param array  $tags
     *
     * @return int
     */
    public function registerReview(
        string $title,
        string $content,
        int $userId,
        string $createdAt,
        array $tags = []
    ): int {
        return \DB::transaction(function () use ($title, $content, $userId, $tags, $createdAt) {
            $reviewId = $this->createReview($title, $content, $userId, $createdAt);
            foreach ($tags as $tag) {
                $this->createReviewTag(
                    $reviewId,
                    $this->createTags($tag, $createdAt),
                    $createdAt
                );
            }
            event(new ReviewRegistered(
                $reviewId,
                $title,
                $content,
                $userId,
                $createdAt,
                $tags
            ));
            return $reviewId;
        });
    }

    /**
     * @param string $name
     * @param string $createdAt
     *
     * @return int
     */
    protected function createTags(string $name, string $createdAt): int
    {
        $result = Tag::firstOrCreate([
            'tag_name' => $name
        ], [
            'created_at' => $createdAt
        ]);
        return $result->id;
    }

    /**
     * @param string $title
     * @param string $content
     * @param int    $userId
     * @param string $createdAt
     *
     * @return int
     */
    protected function createReview(
        string $title,
        string $content,
        int $userId,
        string $createdAt
    ): int {
        $result = Review::firstOrCreate([
            'user_id' => $userId,
            'title' => $title,
        ], [
            'content' => $content,
            'created_at' => $createdAt,
        ]);
        return $result->id;
    }

    protected function createReviewTag(int $reviewId, int $tagId, string $createdAt)
    {
        ReviewTag::firstOrCreate([
            'tag_id' => $tagId,
            'review_id' => $reviewId,
        ], [
            'created_at' => $createdAt,
        ]);
    }
}
