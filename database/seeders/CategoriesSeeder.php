<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            array(
                "Automotive", "https://cdn.jdpower.com/JDPA_2020%20Cadillac%20CT5%20Luxury%20Sedan.jpg", "directions_car"
            ),
            array(
                "Fashion", "https://www.byrdie.com/thmb/5ZHN_h7vN1vLg94eAVZ6DlF1sOE=/800x800/smart/filters:no_upscale()/fashionbloggersprimary-2210aaad71a0454a899fa4345bef529f.jpg", "checkroom"
            ),
            array(
                "Property", "https://thescoop.co/wp-content/uploads/2018/07/architecture-beautiful-exterior-106399-1280x768.jpg", "house"
            ),
            array(
                "Electronics", "https://images.unsplash.com/photo-1504610926078-a1611febcad3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80", "devices"
            ),
            array(
                "Beauty", "https://www.ft.com/__origami/service/image/v2/images/raw/http%3A%2F%2Fcom.ft.imagepublish.upp-prod-eu.s3.amazonaws.com%2Ff2211170-95ef-11e8-b747-fb1e803ee64e?fit=scale-down&source=next&width=700", "face"
            ),
            array(
                "Furniture", "https://www.aleaoffice.com/foto/news/5f19998b74dbc202007231607073.jpg", "chair"
            ),
            array(
                "Baby", "http://cdn.shopify.com/s/files/1/1407/3324/articles/Blog-baby-overheating_3_1300x@2x.jpg?v=1542056180", "child_friendly"
            ),
            array(
                "Toys", "https://i.etsystatic.com/15145632/r/il/b79838/2285400597/il_fullxfull.2285400597_ndtm.jpg", "toys"
            ),
            array(
                "Foot wear", "https://media.gq.com/photos/5ab05ba9a3a5ca214d8baf6c/16:9/w_1280,c_limit/sneaker-of-the-week-lede.jpg", "directions_walk"
            ),
            array(
                "Drinks", "https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/dark-and-stormy-1594302243.png?crop=1xw:1xh;center,top&resize=480:*", "sports_bar"
            ),
            array(
                "Services", "https://i0.wp.com/post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/09/psychodynamic-therapy-1296x728-headert-1024x575.jpg?w=1155&h=1528", "miscellaneous_services"
            ),
            array(
                "Food", "https://images.squarespace-cdn.com/content/v1/53b839afe4b07ea978436183/1608506169128-S6KYNEV61LEP5MS1UIH4/traditional-food-around-the-world-Travlinmad.jpg", "restaurant_menu"
            ),
        );
        foreach($categories as $category){
            $cat = new Category();
            $cat->category = $category[0];
            $cat->category_picture = $category[1];
            $cat->category_icon = $category[2];
            $cat->save();
        }
    }
}
