<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        |
        | Product data taken from Finesse By Design catalogue.
        |
        */

        $products = [

        /*
|--------------------------------------------------------------------------
| COFFEE MACHINES
|--------------------------------------------------------------------------
*/

[
    'category' => 'Coffee Machines',
    'subcategory' => 'Coffee Vending Machine',
    'name' => 'Tea And Coffee Vending Machine',
    'code' => 'CVM-001',
    'dimensions' => 'Standard Commercial Size',
    'weight' => 'Standard',
    'brass_price' => 0,
    'silver_price' => null,
    'finish' => 'Mild Steel Body / Automatic Operation',
],

[
    'category' => 'Coffee Machines',
    'subcategory' => 'Tea & Coffee Vending Machine',
    'name' => 'Atlantis Tea & Coffee Vending Machine',
    'code' => 'ATL-CVM-001',
    'dimensions' => 'Compact Commercial Design',
    'weight' => 'Standard',
    'brass_price' => 0,
    'silver_price' => null,
    'finish' => 'Mild Steel / Automatic',
],

[
    'category' => 'Coffee Machines',
    'subcategory' => 'Atlantis Coffee Vending Machine',
    'name' => 'Atlantis Coffee Vending Machine',
    'code' => 'ATL-CM-001',
    'dimensions' => 'Commercial Office Configuration',
    'weight' => 'Standard',
    'brass_price' => 0,
    'silver_price' => null,
    'finish' => 'Mild Steel / Automatic',
],

[
    'category' => 'Coffee Machines',
    'subcategory' => 'Coffee Machine Rental',
    'name' => 'Coffee Vending Machine Rental Service',
    'code' => 'CVR-001',
    'dimensions' => 'Commercial Vending Machine',
    'weight' => 'Standard',
    'brass_price' => 0,
    'silver_price' => null,
    'finish' => 'Automatic / Rental Service',
],


/*
|--------------------------------------------------------------------------
| COFFEE PREMIXES
|--------------------------------------------------------------------------
*/

[
    'category' => 'Coffee Premixes',
    'subcategory' => 'Nestle Nescafe Coffee Premix',
    'name' => 'Nestle Nescafe Coffee Premix',
    'code' => 'NCP-001',
    'dimensions' => '7.5 x 1 x 11 cm',
    'weight' => '1020 grams',
    'brass_price' => 0,
    'silver_price' => null,
    'finish' => 'Powder / Vegetarian / FSSAI Certified',
],

[
    'category' => 'Coffee Premixes',
    'subcategory' => 'Nescafe Signature Blend',
    'name' => 'Nestle Nescafe Signature Blend Coffee Premix',
    'code' => 'NCP-002',
    'dimensions' => '7.5 x 1 x 11 cm',
    'weight' => '1020 grams',
    'brass_price' => 0,
    'silver_price' => null,
    'finish' => 'Coffee Powder / No Artificial Colours',
],

[
    'category' => 'Coffee Premixes',
    'subcategory' => 'Instant Coffee Premix',
    'name' => 'Nescafe Instant Coffee Premix',
    'code' => 'NCP-003',
    'dimensions' => 'Standard 1 Kg Pack',
    'weight' => '1000 grams',
    'brass_price' => 0,
    'silver_price' => null,
    'finish' => 'Instant Coffee Powder',
],



        ];

        /*
        |--------------------------------------------------------------------------
        | Get Product Table Columns
        |--------------------------------------------------------------------------
        |
        | Isse agar Product table me kuch optional columns nahi hain,
        | to seeder unnecessary SQL error nahi dega.
        |
        */

        $productColumns = Schema::getColumnListing('products');

        /*
        |--------------------------------------------------------------------------
        | Insert Products
        |--------------------------------------------------------------------------
        */

        foreach ($products as $item) {

            $category = Category::where(
                'slug',
                Str::slug($item['category'])
            )->first();

            if (!$category) {
                $this->command->warn(
                    "Category not found: {$item['category']}"
                );

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Find Subcategory
            |--------------------------------------------------------------------------
            */

            $subcategory = Subcategory::where(
                'category_id',
                $category->id
            )
                ->where(
                    'name',
                    $item['subcategory']
                )
                ->first();

            /*
            |--------------------------------------------------------------------------
            | Unique SKU
            |--------------------------------------------------------------------------
            |
            | Catalogue me duplicate codes bhi hain:
            |
            | WC-001
            | ICS-001
            |
            | Isliye hash add kar rahe hain.
            |
            */

            $hash = strtoupper(
                substr(
                    md5(
                        $item['category'] .
                        $item['name'] .
                        $item['code']
                    ),
                    0,
                    6
                )
            );

            $baseSku =
                'FBD-' .
                strtoupper($item['code']) .
                '-' .
                $hash;

            /*
            |--------------------------------------------------------------------------
            | Unique Slug
            |--------------------------------------------------------------------------
            */

            $slug = Str::slug(
                $item['name'] .
                '-' .
                $item['code'] .
                '-' .
                strtolower($hash)
            );

            /*
            |--------------------------------------------------------------------------
            | Description
            |--------------------------------------------------------------------------
            */

            $description =
                $item['name'] .
                ' from Finesse By Design. ' .
                'Premium handcrafted metal giftware. ' .
                'Catalogue Code: ' . $item['code'] . '. ' .
                'Dimensions: ' . $item['dimensions'] . '. ' .
                'Weight: ' . $item['weight'] . '. ' .
                'Finish: ' . $item['finish'] . '.';

            /*
            |--------------------------------------------------------------------------
            | Product Data
            |--------------------------------------------------------------------------
            */

            $productData = [

                'category_id' => $category->id,

                'subcategory_id' => $subcategory?->id,

                'name' => $item['name'],

                'slug' => $slug,

                'sku' => $baseSku,

                /*
                 * Main product price = Brass price
                 */
                'price' => $item['brass_price'],

                'sale_price' => null,

                /*
                 * Default Stock
                 */
                'stock' => 25,

                'stock_quantity' => 25,

                'quantity' => 25,

                /*
                 * Product information
                 */
                'material' => 'Brass',

                'dimensions' => $item['dimensions'],

                // products.weight is numeric in DB, so save grams as a number only.
                'weight' => $this->parseWeight($item['weight']),

                'finish' => $item['finish'],

                'product_code' => $item['code'],

                'code' => $item['code'],

                /*
                 * Description
                 */
                'short_description' =>
                    'Premium handcrafted ' .
                    $item['name'] .
                    ' by Finesse By Design.',

                'description' => $description,

                /*
                 * Status
                 */
                'is_active' => true,

                'is_featured' => false,

                'status' => 'active',

                /*
                 * SEO
                 */
                'meta_title' =>
                    $item['name'] .
                    ' ' .
                    $item['code'] .
                    ' | Finesse By Design',

                'meta_description' =>
                    'Shop ' .
                    $item['name'] .
                    ' (' .
                    $item['code'] .
                    ') handcrafted by Finesse By Design.',
            ];

            /*
            |--------------------------------------------------------------------------
            | Remove fields which do not exist in products table
            |--------------------------------------------------------------------------
            */

            $productData = array_filter(
                $productData,
                fn ($value, $key) =>
                    in_array($key, $productColumns),
                ARRAY_FILTER_USE_BOTH
            );

            /*
            |--------------------------------------------------------------------------
            | Find Existing Product
            |--------------------------------------------------------------------------
            */

            $product = null;

            if (in_array('sku', $productColumns)) {

                $product = Product::where(
                    'sku',
                    $baseSku
                )->first();

            } elseif (in_array('slug', $productColumns)) {

                $product = Product::where(
                    'slug',
                    $slug
                )->first();
            }

            /*
            |--------------------------------------------------------------------------
            | Create Product
            |--------------------------------------------------------------------------
            */

            if (!$product) {
                $product = new Product();
            }

            /*
             * forceFill is used because we don't know
             * every Product::$fillable property.
             */
            $product->forceFill($productData);

            $product->save();

            /*
            |--------------------------------------------------------------------------
            | Brass Variant
            |--------------------------------------------------------------------------
            */

            ProductVariant::updateOrCreate(
                [
                    'sku' => $baseSku . '-BRASS',
                ],
                [
                    'product_id' => $product->id,

                    'size' => null,

                    'color' => 'Brass',

                    'color_hex' => '#B08D57',

                    'attributes' => [
                        'catalogue_code' => $item['code'],
                        'material' => '100% Handcrafted Brass',
                        'dimensions' => $item['dimensions'],
                        'weight' => $item['weight'],
                        'finish' => '100% Handcrafted Brass',
                    ],

                    'price' => $item['brass_price'],

                    'sale_price' => null,

                    'stock' => 25,

                    'image' => null,

                    'is_active' => true,
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | Silver Plated Variant
            |--------------------------------------------------------------------------
            */

            if (!empty($item['silver_price'])) {

                ProductVariant::updateOrCreate(
                    [
                        'sku' => $baseSku . '-SILVER',
                    ],
                    [
                        'product_id' => $product->id,

                        'size' => null,

                        'color' => 'Silver Plated',

                        'color_hex' => '#C0C0C0',

                        'attributes' => [
                            'catalogue_code' => $item['code'],
                            'material' => 'Silver Plated',
                            'dimensions' => $item['dimensions'],
                            'weight' => $item['weight'],
                            'finish' => 'Silver-Plated',
                        ],

                        'price' => $item['silver_price'],

                        'sale_price' => null,

                        'stock' => 15,

                        'image' => null,

                        'is_active' => true,
                    ]
                );
            }

            $this->command->info(
                "Product seeded: {$item['name']} ({$item['code']})"
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Finished
        |--------------------------------------------------------------------------
        */

        $this->command->info(
            'Finesse By Design products seeded successfully.'
        );
    }

    /**
     * Convert catalogue weight text to numeric grams for products.weight.
     *
     * Examples:
     *  "1110 grams" => 1110
     *  "690 gram"   => 690
     *  "40-45 gram" => 43
     */
    private function parseWeight(?string $weight): ?int
    {
        if (!$weight) {
            return null;
        }

        $weight = trim($weight);

        // Handle ranges such as "40-45 gram" by storing the rounded average.
        if (preg_match('/(\d+(?:\.\d+)?)\s*-\s*(\d+(?:\.\d+)?)/', $weight, $matches)) {
            $min = (float) $matches[1];
            $max = (float) $matches[2];

            return (int) round(($min + $max) / 2);
        }

        // Handle normal values such as "1110 grams".
        if (preg_match('/(\d+(?:\.\d+)?)/', $weight, $matches)) {
            return (int) round((float) $matches[1]);
        }

        return null;
    }

}