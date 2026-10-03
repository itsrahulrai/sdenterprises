<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();
        $adminId = $admin ? $admin->id : null;

        $cat1 = BlogCategory::firstOrCreate(
            ['slug' => 'coffee-guides'],
            ['name' => 'Coffee Guides', 'is_active' => true]
        );

        $cat2 = BlogCategory::firstOrCreate(
            ['slug' => 'machine-care'],
            ['name' => 'Maintenance & Care', 'is_active' => true]
        );

        $cat3 = BlogCategory::firstOrCreate(
            ['slug' => 'industry-insights'],
            ['name' => 'Industry Insights', 'is_active' => true]
        );

        Blog::updateOrCreate(
            ['slug' => 'how-to-choose-the-right-commercial-coffee-machine'],
            [
                'admin_id' => $adminId,
                'blog_category_id' => $cat1->id,
                'title' => 'How to Choose the Right Commercial Coffee Machine for Your Office',
                'excerpt' => 'Discover the essential factors in selecting a premium coffee or tea vending machine tailored to your office team size and daily cup requirements.',
                'body' => '<p>Choosing the right commercial coffee machine for your workspace is an investment in productivity, employee happiness, and hospitality for your guests. From bean-to-cup machines to multi-option premix dispensers, explore what fits your workspace best.</p>',
                'thumbnail' => 'blogs/blog-machine-guide.png',
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'views' => 142,
            ]
        );

        Blog::updateOrCreate(
            ['slug' => 'essential-maintenance-tips-for-coffee-vending-machines'],
            [
                'admin_id' => $adminId,
                'blog_category_id' => $cat2->id,
                'title' => 'Essential Maintenance & Cleaning Tips for Vending Machines',
                'excerpt' => 'Keep your coffee and beverage vending machines running smoothly with daily, weekly, and monthly sanitation routines that preserve rich flavor and prevent downtime.',
                'body' => '<p>Regular maintenance ensures optimal performance, consistent beverage quality, and prolonged machine lifespan. Learn the best cleaning practices recommended by our technical experts.</p>',
                'thumbnail' => 'blogs/blog-maintenance-tips.png',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'views' => 98,
            ]
        );

        Blog::updateOrCreate(
            ['slug' => 'fresh-milk-vs-premix-commercial-coffee-solutions'],
            [
                'admin_id' => $adminId,
                'blog_category_id' => $cat3->id,
                'title' => 'Fresh Milk vs Premix: Comparing Office Beverage Solutions',
                'excerpt' => 'Explore the key differences, costs, preparation speeds, and taste profiles between fresh milk coffee setups and instant premix vending systems.',
                'body' => '<p>Whether you need rapid dispensing during peak morning rushes or artisan cafe-grade lattes, discover how both options compare for commercial and institutional environments.</p>',
                'thumbnail' => 'blogs/blog-brewing-solutions.png',
                'status' => 'published',
                'published_at' => now()->subDays(8),
                'views' => 215,
            ]
        );
    }
}
