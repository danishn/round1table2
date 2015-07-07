<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApiAccess
 *
 * @ORM\Table(name="api_access", indexes={@ORM\Index(name="member_id", columns={"member_id"})})
 * @ORM\Entity
 */
class ApiAccess
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;


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
     * Set memberId
     *
     * @param integer $memberId
     *
     * @return ApiAccess
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    
        return $this;
    }

    /**
     * Get memberId
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ApiAccess
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
