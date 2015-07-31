<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conveners
 *
 * @ORM\Table(name="conveners", indexes={@ORM\Index(name="member_id", columns={"member_id"})})
 * @ORM\Entity
 */
class Conveners
{
    /**
     * @var integer
     *
     * @ORM\Column(name="convener_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $convenerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="table_code", type="string", length=25, nullable=false)
     */
    private $tableCode;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=50, nullable=false)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=15, nullable=false)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="text", length=65535, nullable=false)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", length=65535, nullable=false)
     */
    private $details;


    /**
     * Get convenerId
     *
     * @return integer
     */
    public function getConvenerId()
    {
        return $this->convenerId;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     *
     * @return Conveners
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
     * Set name
     *
     * @param string $name
     *
     * @return Conveners
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
     * Set tableCode
     *
     * @param string $tableCode
     *
     * @return Conveners
     */
    public function setTableCode($tableCode)
    {
        $this->tableCode = $tableCode;

        return $this;
    }

    /**
     * Get tableCode
     *
     * @return string
     */
    public function getTableCode()
    {
        return $this->tableCode;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Conveners
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Conveners
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Conveners
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Conveners
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Conveners
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }
}
