<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotificationIds
 *
 * @ORM\Table(name="notification-ids", uniqueConstraints={@ORM\UniqueConstraint(name="notification_id", columns={"notification_id"})}, indexes={@ORM\Index(name="member_id", columns={"member_id"})})
 * @ORM\Entity
 */
class NotificationIds
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
     * @var string
     *
     * @ORM\Column(name="os", type="string", length=20, nullable=false)
     */
    private $os;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_id", type="string", length=250, nullable=false)
     */
    private $notificationId;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set os
     *
     * @param string $os
     *
     * @return NotificationIds
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return string
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Set notificationId
     *
     * @param string $notificationId
     *
     * @return NotificationIds
     */
    public function setNotificationId($notificationId)
    {
        $this->notificationId = $notificationId;

        return $this;
    }

    /**
     * Get notificationId
     *
     * @return string
     */
    public function getNotificationId()
    {
        return $this->notificationId;
    }

    /**
     * Set member
     *
     * @param \Entities\Members $member
     *
     * @return NotificationIds
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