<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Author
 */
class Author implements ResourceInterface{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $name;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
       return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @var string
     */
    private $condition;


    /**
     * Set condition
     *
     * @param string $condition
     * @return Author
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

}
