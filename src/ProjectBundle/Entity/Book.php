<?php

namespace ProjectBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\ContentBundle\Entity\Content;

/**
 * Book
 */
class Book extends Content implements ResourceInterface
{

    /**
     * @var string
     */
    private $year;

    /**
     * @var FileInterface
     */
    private $pictures;

    /**
     * @var \stdClass
     */
    private $content;

    /**
     * @var \stdClass
     */
    private $biography;

    /**
     * @var \stdClass
     */
    private $author;

    /**
     * @var \stdClass
     */
    private $link;

    /**
     * @var string
     */
    private $condition;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->author = new \Doctrine\Common\Collections\ArrayCollection();
        $this->link = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Book
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set condition
     *
     * @param string $condition
     * @return Book
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition
     *
     * @return string 
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param \stdClass $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }


    /**
     * Get author
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthor()
    {
        return $this->author;
    }



    /**
     * Add link
     *
     * @param \Enhavo\Bundle\ProjectBundle\Entity\Content $link
     * @return Link
     */
    public function addLink(\Enhavo\Bundle\ProjectBundle\Entity\Content $link)
    {
        $this->link[] = $link;

        return $this;
    }

    /**
     * Remove link
     *
     * @param \Enhavo\Bundle\ProjectBundle\Entity\Content $link
     */
    public function removeLink(\Enhavo\Bundle\ProjectBundle\Entity\Content $link)
    {
        $this->link->removeElement($link);
    }



    /**
     * Get link
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set content
     *
     * @param \Enhavo\Bundle\GridBundle\Entity\Grid $content
     * @return Book
     */
    public function setContent(\Enhavo\Bundle\GridBundle\Entity\Grid $content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \Enhavo\Bundle\GridBundle\Entity\Grid 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set biography
     *
     * @param \Enhavo\Bundle\GridBundle\Entity\Grid $biography
     * @return Book
     */
    public function setBiography(\Enhavo\Bundle\GridBundle\Entity\Grid $biography = null)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return \Enhavo\Bundle\GridBundle\Entity\Grid 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Add pictures
     *
     * @param \Enhavo\Bundle\MediaBundle\Entity\File $pictures
     * @return Book
     */
    public function addPicture(\Enhavo\Bundle\MediaBundle\Entity\File $pictures)
    {
        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \Enhavo\Bundle\MediaBundle\Entity\File $pictures
     */
    public function removePicture(\Enhavo\Bundle\MediaBundle\Entity\File $pictures)
    {
        $this->pictures->removeElement($pictures);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}