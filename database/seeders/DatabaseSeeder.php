<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Admin
        |--------------------------------------------------------------------------
        */

        Admin::updateOrCreate(
            ['email' => 'thahriani.sumit@gmail.com'],
            [
                'name'       => 'S D Enterprises',
                'password'   => Hash::make('Admin@12345'),
                'role'       => 'super_admin',
                'is_active'  => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Coffee Categories & Subcategories
        |--------------------------------------------------------------------------
        */

        $categories = [

            /*
            |--------------------------------------------------------------------------
            | Coffee Machines
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'Coffee Machines',
                'icon' => '',
                'is_featured' => true,
                'subcategories' => [
                    'Coffee Vending Machine',
                    'Tea & Coffee Vending Machine',
                    'Atlantis Tea & Coffee Vending Machine',
                    'Coffee Machine Rental',
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | Coffee Premixes
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'Coffee Premixes',
                'icon' => '',
                'is_featured' => true,
                'subcategories' => [
                    'Nestle Nescafe Coffee Premix',
                    'Nescafe Signature Blend',
                    'Instant Coffee Premix',
                ],
            ],
        ];

        foreach ($categories as $categoryData) {

            $subcategories = $categoryData['subcategories'] ?? [];

            unset($categoryData['subcategories']);

            $slug = Str::slug($categoryData['name']);

            $category = Category::updateOrCreate(
                [
                    'slug' => $slug,
                ],
                [
                    'name'        => $categoryData['name'],
                    'slug'        => $slug,
                    'icon'        => $categoryData['icon'],
                    'is_featured' => $categoryData['is_featured'],
                    'is_active'   => true,
                ]
            );

            foreach ($subcategories as $subcategoryName) {

                /*
                |--------------------------------------------------------------------------
                | Include category slug in subcategory slug
                |--------------------------------------------------------------------------
                */

                $subcategorySlug = Str::slug(
                    $category->slug . '-' . $subcategoryName
                );

                Subcategory::updateOrCreate(
                    [
                        'slug' => $subcategorySlug,
                    ],
                    [
                        'category_id' => $category->id,
                        'name'        => $subcategoryName,
                        'slug'        => $subcategorySlug,
                        'is_active'   => true,
                    ]
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Website Settings
        |--------------------------------------------------------------------------
        */

        $settings = [

            [
                'key'   => 'site_name',
                'value' => 'S D Enterprises',
                'group' => 'general',
            ],

            [
                'key'   => 'site_tagline',
                'value' => 'Coffee & Tea Vending Machines and Premixes',
                'group' => 'general',
            ],

            [
                'key'   => 'site_email',
                'value' => 'thahriani.sumit@gmail.com',
                'group' => 'general',
            ],

            [
                'key'   => 'site_phone',
                'value' => '+91 99118 15542',
                'group' => 'general',
            ],

            [
                'key'   => 'currency_symbol',
                'value' => '₹',
                'group' => 'general',
            ],

            [
                'key'   => 'currency_code',
                'value' => 'INR',
                'group' => 'general',
            ],

            /*
            |--------------------------------------------------------------------------
            | Shipping
            |--------------------------------------------------------------------------
            |
            | Coffee machines are generally quote-based on the source website.
            | Keep shipping values configurable from the admin/settings.
            |
            */

            [
                'key'   => 'free_shipping_threshold',
                'value' => '5000',
                'group' => 'general',
            ],

            [
                'key'   => 'shipping_charge',
                'value' => '250',
                'group' => 'general',
            ],

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            [
                'key'   => 'meta_title',
                'value' => 'S D Enterprises | Coffee Vending Machines & Coffee Premixes',
                'group' => 'seo',
            ],

            [
                'key'   => 'meta_description',
                'value' =>
                    'S D Enterprises offers coffee vending machines, tea and coffee vending solutions, and Nestle Nescafe coffee premixes for offices, commercial spaces and institutions.',
                'group' => 'seo',
            ],

            [
                'key'   => 'footer_about',
                'value' =>
                    'S D Enterprises provides coffee and tea vending machines, coffee premixes and beverage solutions for offices, commercial spaces and institutions across Delhi NCR and India.',
                'group' => 'general',
            ],
        ];

        foreach ($settings as $setting) {

            Setting::updateOrCreate(
                [
                    'key' => $setting['key'],
                ],
                $setting
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Console Output
        |--------------------------------------------------------------------------
        */

        $this->command->info(
            'Seeded: S D Enterprises Admin, Coffee Categories, Subcategories and Settings'
        );

        $this->command->info(
            'Admin Login: thahriani.sumit@gmail.com / Admin@12345'
        );
    }
}
