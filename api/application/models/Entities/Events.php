<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events", indexes={@ORM\Index(name="member_id", columns={"member_id"})})
 * @ORM\Entity
 */
class Events
{
    /**
     * @var integer
     *
     * @ORM\Column(name="event_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="event_name", type="text", length=65535, nullable=false)
     */
    private $eventName;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="short_desc", type="text", length=65535, nullable=false)
     */
    private $shortDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="long_desc", type="text", length=65535, nullable=false)
     */
    private $longDesc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_date", type="date", nullable=false)
     */
    private $eventDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_time", type="time", nullable=false)
     */
    private $eventTime;

    /**
     * @var string
     *
     * @ORM\Column(name="event_venue", type="text", length=65535, nullable=false)
     */
    private $eventVenue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="date", nullable=false)
     */
    private $createdOn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="family", type="boolean", nullable=false)
     */
    private $family;

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
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

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
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set eventName
     *
     * @param string $eventName
     *
     * @return Events
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Get eventName
     *
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Events
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set shortDesc
     *
     * @param string $shortDesc
     *
     * @return Events
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    /**
     * Get shortDesc
     *
     * @return string
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * Set longDesc
     *
     * @param string $longDesc
     *
     * @return Events
     */
    public function setLongDesc($longDesc)
    {
        $this->longDesc = $longDesc;

        return $this;
    }

    /**
     * Get longDesc
     *
     * @return string
     */
    public function getLongDesc()
    {
        return $this->longDesc;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     *
     * @return Events
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set eventTime
     *
     * @param \DateTime $eventTime
     *
     * @return Events
     */
    public function setEventTime($eventTime)
    {
        $this->eventTime = $eventTime;

        return $this;
    }

    /**
     * Get eventTime
     *
     * @return \DateTime
     */
    public function getEventTime()
    {
        return $this->eventTime;
    }

    /**
     * Set eventVenue
     *
     * @param string $eventVenue
     *
     * @return Events
     */
    public function setEventVenue($eventVenue)
    {
        $this->eventVenue = $eventVenue;

        return $this;
    }

    /**
     * Get eventVenue
     *
     * @return string
     */
    public function getEventVenue()
    {
        return $this->eventVenue;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return Events
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set family
     *
     * @param boolean $family
     *
     * @return Events
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return boolean
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set bigUrl
     *
     * @param string $bigUrl
     *
     * @return Events
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
     * @return Events
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
     * Set status
     *
     * @param boolean $status
     *
     * @return Events
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
     * Set member
     *
     * @param \Entities\Members $member
     *
     * @return Events
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
}