<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new \App\Product([
        	'imagePath'=>'http://vignette1.wikia.nocookie.net/lotr/images/8/87/Ringstrilogyposter.jpg/revision/latest?cb=20070806215413',
        	'title'=>'LOTR By GRRT',
        	'description'=>'A Great Book',
        	'price'=>10
        	]);
        $product->save();
         $product=new \App\Product([
        	'imagePath'=>'http://vignette1.wikia.nocookie.net/lotr/images/8/87/Ringstrilogyposter.jpg/revision/latest?cb=20070806215413',
        	'title'=>'LOTR By GRRT',
        	'description'=>'A Great Book',
        	'price'=>10
        	]);
        $product->save();
         $product=new \App\Product([
        	'imagePath'=>'http://vignette1.wikia.nocookie.net/lotr/images/8/87/Ringstrilogyposter.jpg/revision/latest?cb=20070806215413',
        	'title'=>'LOTR By GRRT',
        	'description'=>'A Great Book',
        	'price'=>10
        	]);
        $product->save();
         $product=new \App\Product([
        	'imagePath'=>'http://vignette1.wikia.nocookie.net/lotr/images/8/87/Ringstrilogyposter.jpg/revision/latest?cb=20070806215413',
        	'title'=>'LOTR By GRRT',
        	'description'=>'A Great Book',
        	'price'=>10
        	]);
        $product->save();
         $product=new \App\Product([
        	'imagePath'=>'http://vignette1.wikia.nocookie.net/lotr/images/8/87/Ringstrilogyposter.jpg/revision/latest?cb=20070806215413',
        	'title'=>'LOTR By GRRT',
        	'description'=>'A Great Book',
        	'price'=>10
        	]);
        $product->save();
         $product=new \App\Product([
        	'imagePath'=>'http://vignette1.wikia.nocookie.net/lotr/images/8/87/Ringstrilogyposter.jpg/revision/latest?cb=20070806215413',
        	'title'=>'LOTR By GRRT',
        	'description'=>'A Great Book',
        	'price'=>10
        	]);
        $product->save();
    }
}
