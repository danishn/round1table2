<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Members
 *
 * @ORM\Table(name="members", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email", "otp"})})
 * @ORM\Entity
 */
class Members
{
    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $memberId;

    /**
     * @var integer
     *
     * @ORM\Column(name="table_id", type="integer", nullable=false)
     */
    private $tableId;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=250, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_date", type="date", nullable=false)
     */
    private $registrationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_visit_date", type="datetime", nullable=false)
     */
    private $lastVisitDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_type", type="integer", nullable=false)
     */
    private $memberType;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="client_id", type="string", length=25, nullable=false)
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="otp", type="string", length=10, nullable=false)
     */
    private $otp;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=250, nullable=false)
     */
    private $designation;


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
     * Set tableId
     *
     * @param integer $tableId
     *
     * @return Members
     */
    public function setTableId($tableId)
    {
        $this->tableId = $tableId;
    
        return $this;
    }

    /**
     * Get tableId
     *
     * @return integer
     */
    public function getTableId()
    {
        return $this->tableId;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Members
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     *
     * @return Members
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    
        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Set lastVisitDate
     *
     * @param \DateTime $lastVisitDate
     *
     * @return Members
     */
    public function setLastVisitDate($lastVisitDate)
    {
        $this->lastVisitDate = $lastVisitDate;
    
        return $this;
    }

    /**
     * Get lastVisitDate
     *
     * @return \DateTime
     */
    public function getLastVisitDate()
    {
        return $this->lastVisitDate;
    }

    /**
     * Set memberType
     *
     * @param integer $memberType
     *
     * @return Members
     */
    public function setMemberType($memberType)
    {
        $this->memberType = $memberType;
    
        return $this;
    }

    /**
     * Get memberType
     *
     * @return integer
     */
    public function getMemberType()
    {
        return $this->memberType;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Members
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
     * Set email
     *
     * @param string $email
     *
     * @return Members
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
     * Set clientId
     *
     * @param string $clientId
     *
     * @return Members
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    
        return $this;
    }

    /**
     * Get clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set otp
     *
     * @param string $otp
     *
     * @return Members
     */
    public function setOtp($otp)
    {
        $this->otp = $otp;
    
        return $this;
    }

    /**
     * Get otp
     *
     * @return string
     */
    public function getOtp()
    {
        return $this->otp;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Members
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
}
