<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Tenant::setTenant(null);
        $categories = \App\Models\Category::all();
        factory(Product::class, 300)
            ->make()
            ->each(function (Product $product) use ($categories) {
                $tenantId = rand(1, 3);
                $category = $categories->where(\Tenant::getTenantField(), $tenantId)->random();
                $product->category_id = $category->id;
                $product->{\Tenant::getTenantField()} = $tenantId;
                $product->save();
            });
    }
}
