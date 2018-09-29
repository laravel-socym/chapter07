<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\PdfGenerator;

use function dispatch;

/**
 * Class PdfGeneratorController
 */
class PdfGeneratorController extends Controller
{
    public function __invoke()
    {
        $generator = new PdfGenerator(storage_path('pdf/sample.pdf'));
        dispatch($generator)->onQueue('pdf.generator');
        // PdfGenerator::dispatch(storage_path('pdf/sample.pdf'));
    }
}
