<?php
namespace StoreBundle\DataFixtures;

use StoreBundle\Entity\Product;
use StoreBundle\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StoreFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{
		for ($i=1; $i <15; $i++) { 
			$image= new Image();
			$image->setUrl("bundles/app/img/products/shoe-".$i.".jpg");
			$product = new Product();
			$product->setTitle('product'.$i);
			$product->setPrice(mt_rand(10, 100));
			$product->setImage($image);
			$manager->persist($product);
			$manager->persist($image);
			$manager->persist($product);

		}
		$manager->flush();
	}
}
?>