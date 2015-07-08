<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rsvp
 *
 * @ORM\Table(name="rsvp")
 * @ORM\Entity
 */
class Rsvp
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
     * @var integer
     *
     * @ORM\Column(name="event_id", type="integer", nullable=false)
     */
    private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="rsvp", type="string", length=10, nullable=true)
     */
    private $rsvp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="response_date", type="date", nullable=false)
     */
    private $responseDate;


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
     * @return Rsvp
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
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return Rsvp
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;

        return $this;
    }

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
     * Set rsvp
     *
     * @param string $rsvp
     *
     * @return Rsvp
     */
    public function setRsvp($rsvp)
    {
        $this->rsvp = $rsvp;

        return $this;
    }

    /**
     * Get rsvp
     *
     * @return string
     */
    public function getRsvp()
    {
        return $this->rsvp;
    }

    /**
     * Set responseDate
     *
     * @param \DateTime $responseDate
     *
     * @return Rsvp
     */
    public function setResponseDate($responseDate)
    {
        $this->responseDate = $responseDate;

        return $this;
    }

    /**
     * Get responseDate
     *
     * @return \DateTime
     */
    public function getResponseDate()
    {
        return $this->responseDate;
    }
}
