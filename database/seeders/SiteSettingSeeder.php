<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'seo_title',
                'group' => 'seo',
                'value' => 'Red Promo',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'description',
                'group' => 'seo',
                'value' => 'Red Promo Description',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'seo_keyword',
                'group' => 'seo',
                'value' => 'Red Promo seo_keyword',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'phone',
                'group' => 'contacts',
                'value' => '9145556633',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        foreach ($data as $key => $item) {
            DB::table('site_settings')->insert($item);
        }
    }
}
