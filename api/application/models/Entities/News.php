<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news", indexes={@ORM\Index(name="member_id", columns={"member_id"})})
 * @ORM\Entity
 */
class News
{
    /**
     * @var integer
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $newsId;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="text", length=65535, nullable=false)
     */
    private $headline;

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
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="tagline", type="text", length=65535, nullable=true)
     */
    private $tagline;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date", nullable=false)
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_date", type="date", nullable=false)
     */
    private $publishDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="broadcast", type="boolean", nullable=false)
     */
    private $broadcast;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="image_date", type="date", nullable=false)
     */
    private $imageDate;

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
     * Get newsId
     *
     * @return integer
     */
    public function getNewsId()
    {
        return $this->newsId;
    }

    /**
     * Set headline
     *
     * @param string $headline
     *
     * @return News
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Get headline
     *
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Set bigUrl
     *
     * @param string $bigUrl
     *
     * @return News
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
     * @return News
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
     * Set description
     *
     * @param string $description
     *
     * @return News
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
     * Set tagline
     *
     * @param string $tagline
     *
     * @return News
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
    }

    /**
     * Get tagline
     *
     * @return string
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return News
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return News
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set publishDate
     *
     * @param \DateTime $publishDate
     *
     * @return News
     */
    public function setPublishDate($publishDate)
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    /**
     * Get publishDate
     *
     * @return \DateTime
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Set broadcast
     *
     * @param boolean $broadcast
     *
     * @return News
     */
    public function setBroadcast($broadcast)
    {
        $this->broadcast = $broadcast;

        return $this;
    }

    /**
     * Get broadcast
     *
     * @return boolean
     */
    public function getBroadcast()
    {
        return $this->broadcast;
    }

    /**
     * Set imageDate
     *
     * @param \DateTime $imageDate
     *
     * @return News
     */
    public function setImageDate($imageDate)
    {
        $this->imageDate = $imageDate;

        return $this;
    }

    /**
     * Get imageDate
     *
     * @return \DateTime
     */
    public function getImageDate()
    {
        return $this->imageDate;
    }

    /**
     * Set member
     *
     * @param \Entities\Members $member
     *
     * @return News
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
     * @return News
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
