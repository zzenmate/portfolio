<?php

namespace Application\PortfolioBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Application\PortfolioBundle\Entity\Category
 *
 * @orm:Table(name="portfolio_categories")
 * @orm:Entity
 */
class Category
{
    /**
     * @var integer $id
     *
     * @orm:Column(name="id", type="integer")
     * @orm:Id
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @orm:Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $slug
     *
     * @orm:Column(name="slug", type="string", length=128, unique=true)
     */
    private $slug;

    /**
     * @var text $description
     *
     * @orm:Column(name="description", type="text")
     */
    private $description;

    /**
     * @var Doctrine\Common\Collections\ArrayCollection
     *
     * @orm:ManyToMany(targetEntity="Application\PortfolioBundle\Entity\Project", mappedBy="categories")
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getProjects()
    {
        return $this->projects;
    }

    public function addProject(\Application\PortfolioBundle\Entity\Project $project)
    {
        $this->projects[] = $project;
    }

    public function __toString()
    {
        return $this->getName();
    }

}