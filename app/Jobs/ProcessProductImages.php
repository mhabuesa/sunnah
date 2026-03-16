<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\ProductMeta;
use App\Traits\ImageSaveTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessProductImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use ImageSaveTrait;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $productId,
        public ?string $mainImage,
        public array $gallery,
        public ?string $metaImage
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->productId);

        // main image
        if ($this->mainImage) {
            $source = storage_path('app/public/'.$this->mainImage);
            $finalPath = $this->processImageFromPath($source, 'product','600','600');
            $product->update(['image' => $finalPath]);
        }

        // gallery
        if ($this->gallery) {
            foreach ($this->gallery as $img) {
                $source = storage_path('app/public/'.$img);
                $finalPath = $this->processImageFromPath($source, 'product/gallery','600','600');
                $product->galleries()->create([
                    'image' => $finalPath,
                ]);
            }
        }

         // Meta image
        if ($this->metaImage) {
            $metaData = ProductMeta::where('product_id', $this->productId)->first();
            $source = storage_path('app/public/'.$this->metaImage);
            $finalPath = $this->processImageFromPath($source, 'product/meta','600','600');
            $metaData->update(['meta_image' => $finalPath]);
        }
    }
}