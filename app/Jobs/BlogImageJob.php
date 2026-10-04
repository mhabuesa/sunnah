<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Traits\ImageSaveTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BlogImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use ImageSaveTrait;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $blogId,
        public ?string $Image,
        public ?string $metaImage,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $blog = Blog::find($this->blogId);

        // main image
        if ($this->Image) {
            $source = storage_path('app/public/' . $this->Image);
            $finalPath = $this->processImageFromPath($source, 'blog');
            $blog->update(['image' => $finalPath]);
        }

         // Meta image
        if ($this->metaImage) {
            $source = storage_path('app/public/'.$this->metaImage);
            $finalPath = $this->processImageFromPath($source, 'blog/meta');
            $blog->update(['meta_image' => $finalPath]);
        }
    }
}