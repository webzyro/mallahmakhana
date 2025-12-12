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

        // ------------ STATIC PAGES ------------
        $static = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/about-us'))
            ->add(Url::create('/contact-us'))
            ->add(Url::create('/login'))
            ->add(Url::create('/register'))
            ->add(Url::create('/wishlist'))
            ->add(Url::create('/cart'))
            ->add(Url::create('/checkout'))
            ->add(Url::create('/privacy-policy'))
            ->add(Url::create('/terms-and-conditions'));

        $static->writeToFile($basePath . 'sitemap-static.xml');


        // ------------ BLOG SITEMAP ------------
        $blogSitemap = Sitemap::create();

        Blog::where('is_active', true)->chunk(100, function ($blogs) use ($blogSitemap) {
            foreach ($blogs as $blog) {
                $blogSitemap->add(
                    Url::create(url("/blog/{$blog->slug}"))
                        ->setLastModificationDate($blog->updated_at)
                );
            }
        });

        $blogSitemap->writeToFile($basePath . 'sitemap-blogs.xml');


        // ------------ PRODUCT SITEMAP ------------
        $productSitemap = Sitemap::create();

        Product::where('is_active', true)->chunk(100, function ($products) use ($productSitemap) {
            foreach ($products as $product) {
                $productSitemap->add(
                    Url::create(url("/product/{$product->slug}"))
                        ->setLastModificationDate($product->updated_at)
                );
            }
        });

        $productSitemap->writeToFile($basePath . 'sitemap-products.xml');


        // ------------ SITEMAP INDEX ------------
        SitemapIndex::create()
            ->add('/sitemap-static.xml')
            ->add('/sitemap-blogs.xml')
            ->add('/sitemap-products.xml')
            ->writeToFile($basePath . 'sitemap.xml');

        $this->info('All sitemaps generated successfully!');
    }
}
