<?php
declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Knp\Snappy\Pdf;

class PdfGenerator // implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string */
    private $path = '';

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param Pdf $pdf
     */
    public function handle(Pdf $pdf)
    {
        $pdf->generateFromHtml(
            '<h1>Laravel</h1><p>Sample PDF Output.</p>', $this->path
        );
    }
}
