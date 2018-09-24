<?php
declare(strict_types=1);

namespace App\Http\Controllers\Review;

use App\DataProvider\Database\RetrieveReviewDataProvider;
use App\DataProvider\Elasticsearch\ReadReviewDataProvider;
use App\DataProvider\Elasticsearch\AddReviewIndexDataProvider;
use App\Entity\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class IndexAction
 */
class IndexAction extends Controller
{
    /** @var  ReadReviewDataProvider */
    private $provider;

    /**
     * IndexAction constructor.
     *
     * @param  ReadReviewDataProvider $provider
     */
    public function __construct(
        ReadReviewDataProvider $provider
    ) {
        $this->provider = $provider;
    }

    public function __invoke(string $id)
    {
        $review = $this->provider->findAllByTag(['Laravel', 'Event']);
        dd($review);
        return response()->json([]);
    }
}
