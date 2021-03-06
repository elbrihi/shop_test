<?php

namespace Foggyline\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Foggyline\CatalogBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *@var int
     * 
     *@ORM\Column(name="parent_category_id",type="integer") 
     */
    private $parentCategoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url_key", type="string", length=255, unique=true)
     */
    private $urlKey;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Assert\File(mimeTypes={"image/png","image/jpeg","image/jpg"}, mimeTypesMessage="Please upload the PNG or JPEG image file")
     */
    private $image;
    /**
     * 
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Foggyline\UserBundle\Entity\User",inversedBy="categories")
     */
    private $user ;
    /** 
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $products ;

    public function __construct()
    {
        $this->products =  new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        
    }
    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    // sub-cathegory

     /**
     * Set parentCategoryId
     *
     * @param int $parent_category_id
     *
     * @return Category
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->parentCategoryId = $parentCategoryId;

        return $this;
    }

    /**
     * Get parentCategoryId
     *
     * @return int
     */
    public function getParentCategoryId()
    {
        return $this->parentCategoryId;
    }
    // sub-category

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set urlKey
     *
     * @param string $urlKey
     *
     * @return Category
     */
    public function setUrlKey($urlKey)
    {
        $this->urlKey = $urlKey;

        return $this;
    }

    /**
     * Get urlKey
     *
     * @return string
     */
    public function getUrlKey()
    {
        return $this->urlKey;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Category
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * @param user
     * 
     * @return category 
     */
    public function setUser(\Foggyline\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }
    public function getUser()
    {
        return $this->user ;
    }
    public function __toString()
    {
        return $this->getTitle();
    }
}

