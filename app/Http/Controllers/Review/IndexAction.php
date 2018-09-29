<?php
declare(strict_types=1);

namespace App\Http\Controllers\Review;

use App\DataProvider\Elasticsearch\ReadReviewDataProvider;
use App\Http\Controllers\Controller;

use function response;

/**
 * Class IndexAction
 *
 * readをelasticearchを利用する例
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

    public function __invoke()
    {
        $review = $this->provider->findAllByTag(['Symfony']);

        return response()->json($review);
    }
}
