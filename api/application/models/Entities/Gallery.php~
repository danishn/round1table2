<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery", indexes={@ORM\Index(name="member_id", columns={"member_id"})})
 * @ORM\Entity
 */
class Gallery
{
    /**
     * @var integer
     *
     * @ORM\Column(name="image_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imageId;

    /**
     * @var string
     *
     * @ORM\Column(name="big_url", type="text", length=65535, nullable=false)
     */
    private $bigUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb_url", type="text", length=65535, nullable=false)
     */
    private $thumbUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submit_date", type="date", nullable=false)
     */
    private $submitDate;

    /**
     * @var string
     *
     * @ORM\Column(name="image_desc", type="text", length=65535, nullable=false)
     */
    private $imageDesc;

    /**
     * @var \Entities\Members
     *
     * @ORM\ManyToOne(targetEntity="Entities\Members")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="member_id", referencedColumnName="member_id")
     * })
     */
    private $member;


    /**
     * Get imageId
     *
     * @return integer
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set bigUrl
     *
     * @param string $bigUrl
     *
     * @return Gallery
     */
    public function setBigUrl($bigUrl)
    {
        $this->bigUrl = $bigUrl;

        return $this;
    }

    /**
     * Get bigUrl
     *
     * @return string
     */
    public function getBigUrl()
    {
        return $this->bigUrl;
    }

    /**
     * Set thumbUrl
     *
     * @param string $thumbUrl
     *
     * @return Gallery
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * Get thumbUrl
     *
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * Set submitDate
     *
     * @param \DateTime $submitDate
     *
     * @return Gallery
     */
    public function setSubmitDate($submitDate)
    {
        $this->submitDate = $submitDate;

        return $this;
    }

    /**
     * Get submitDate
     *
     * @return \DateTime
     */
    public function getSubmitDate()
    {
        return $this->submitDate;
    }

    /**
     * Set imageDesc
     *
     * @param string $imageDesc
     *
     * @return Gallery
     */
    public function setImageDesc($imageDesc)
    {
        $this->imageDesc = $imageDesc;

        return $this;
    }

    /**
     * Get imageDesc
     *
     * @return string
     */
    public function getImageDesc()
    {
        return $this->imageDesc;
    }

    /**
     * Set member
     *
     * @param \Entities\Members $member
     *
     * @return Gallery
     */
    public function setMember(\Entities\Members $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \Entities\Members
     */
    public function getMember()
    {
        return $this->member;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;


    /**
     * Set memberId
     *
     * @param integer $memberId
     *
     * @return Gallery
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
}
