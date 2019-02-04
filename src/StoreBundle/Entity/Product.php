<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(name="titre", type="string", nullable=false)
     */
    private $title;
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @ORM\Column(name="prix", type="decimal", scale=2, nullable=false)
     */
    private $price;
    /**
     * @ORM\Column(name="creeLe", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
    * @ORM\OneToOne(targetEntity="StoreBundle\Entity\Image", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $image;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    function getId(){
        return $this->id;
    }

    function getTitle(){
        return $this->title;
    }

    function getDescription(){
        return $this->description;
    }

    function getPrice(){
        return $this->price;
    }

    function getCreatedAt(){
        return $this->createdAt;
    }

    function getImage(){
        return $this->image;
    }

    function setId($id){
        $this->id=$id;
    }

    function setTitle($title){
        $this->title=$title;
    }

    function setDescription($description){
        $this->description=$description;
    }

    function setPrice($price){
        $this->price=$price;
    }

    function setCreatedAt($date){
        $this->createdAt=$date;
    }

    function setImage(Image $image=null){
        $this->image=$image;
    }
}
?>