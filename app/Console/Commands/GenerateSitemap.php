<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.xml file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $basePath = public_path('/');

        /*
        |--------------------------------------------------------------------------
        | STATIC PAGES SITEMAP
        |--------------------------------------------------------------------------
        */
        $static = Sitemap::create()
            ->add(Url::create(url('/')))
            ->add(Url::create(url('/about-us')))
            ->add(Url::create(url('/contact-us')))
            ->add(Url::create(url('/login')))
            ->add(Url::create(url('/register')))
            ->add(Url::create(url('/wishlist')))
            ->add(Url::create(url('/cart')))
            ->add(Url::create(url('/checkout')))
            ->add(Url::create(url('/privacy-policy')))
            ->add(Url::create(url('/terms-and-conditions')));

        $static->writeToFile($basePath . 'sitemap-static.xml');


        /*
        |--------------------------------------------------------------------------
        | BLOG SITEMAP (SAFE & CORRECT)
        |--------------------------------------------------------------------------
        */
        $blogSitemap = Sitemap::create();

        Blog::where('is_active', true)->each(function ($blog) use ($blogSitemap) {
            $blogSitemap->add(
                Url::create(url("/blog/{$blog->slug}"))
                    ->setLastModificationDate($blog->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.8)
            );
        });

        $blogSitemap->writeToFile($basePath . 'sitemap-blogs.xml');


        /*
        |--------------------------------------------------------------------------
        | PRODUCT SITEMAP (SAFE & CORRECT)
        |--------------------------------------------------------------------------
        */
        $productSitemap = Sitemap::create();

        Product::where('is_active', true)->each(function ($product) use ($productSitemap) {
            $productSitemap->add(
                Url::create(url("/product/{$product->slug}"))
                    ->setLastModificationDate($product->updated_at)
                    ->setChangeFrequency('daily')
                    ->setPriority(0.9)
            );
        });

        $productSitemap->writeToFile($basePath . 'sitemap-products.xml');


        /*
        |--------------------------------------------------------------------------
        | FINAL SITEMAP INDEX
        |--------------------------------------------------------------------------
        */
        SitemapIndex::create()
            ->add(url('/sitemap-static.xml'))
            ->add(url('/sitemap-blogs.xml'))
            ->add(url('/sitemap-products.xml'))
            ->writeToFile($basePath . 'sitemap.xml');

        $this->info('All sitemaps generated successfully!');
    }
}
