<?php
declare(strict_types=1);

namespace App\DataProvider;

/**
 * Interface AddReviewIndexProviderInterface
 */
interface AddReviewIndexProviderInterface
{
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
    ): array;
}
