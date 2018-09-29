<?php
declare(strict_types=1);

namespace App\DataProvider\Database;

use App\Entity\Tag;

use function intval;

/**
 * Class RetrieveReviewDataProvider
 */
class RetrieveReviewDataProvider
{
    /**
     * @param int $id
     *
     * @return \App\Entity\Review
     */
    public function retrieveReview(int $id): \App\Entity\Review
    {
        $result = Review::find($id);
        $reviewTag = new ReviewTag();
        $review = new \App\Entity\Review($result->id, $result->title, $result->content);
        foreach($reviewTag->byReviewId(intval($result->id)) as $item) {
            $review->setTag(new Tag($item->id, $item->tag_name));
        }
        $review->setCreatedAt($result->created_at);
        return $review;
    }
}
