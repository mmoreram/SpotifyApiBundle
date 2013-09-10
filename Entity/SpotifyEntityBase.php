<?php

/**
 * Spotify API Bundle for Symfony2
 * 
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Entity;


/**
 * Spotify base entity
 */
class SpotifyEntityBase
{

    /**
     * @var int
     * 
     * Entity id
     */
    protected $id;


    /**
     * @var string
     * 
     * Href
     */
    protected $href;


    /**
     * @var string
     * 
     * Name
     */
    protected $name;


    /**
     * @var int
     * 
     * Popularity
     */
    protected $popularity;


    /**
     * Sets id
     * 
     * @param integer $id Id
     * 
     * @return SpotifyEntityBase self Object
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Return id
     * 
     * @return integer Id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Sets href
     * 
     * @param string $href Href
     * 
     * @return SpotifyEntityBase self Object
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }


    /**
     * Return href
     * 
     * @return string Href
     */
    public function getHref()
    {
        return $this->href;
    }


    /**
     * Sets name
     * 
     * @param string $name Name
     * 
     * @return SpotifyEntityBase self Object
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Return name
     * 
     * @return string Name
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Sets popularity
     * 
     * @param integer $popularity Popularity
     * 
     * @return SpotifyEntityBase self Object
     */
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;

        return $this;
    }


    /**
     * Return popularity
     * 
     * @return integer Popularity
     */
    public function getPopularity()
    {
        return $this->popularity;
    }
}