<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tables
 *
 * @ORM\Table(name="tables", uniqueConstraints={@ORM\UniqueConstraint(name="table_code", columns={"table_code"})})
 * @ORM\Entity
 */
class Tables
{
    /**
     * @var integer
     *
     * @ORM\Column(name="table_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tableId;

    /**
     * @var string
     *
     * @ORM\Column(name="table_name", type="string", length=250, nullable=false)
     */
    private $tableName;

    /**
     * @var string
     *
     * @ORM\Column(name="table_code", type="string", length=50, nullable=false)
     */
    private $tableCode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="date", nullable=false)
     */
    private $createdOn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="big_url", type="string", length=250, nullable=false)
     */
    private $bigUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb_url", type="text", length=65535, nullable=false)
     */
    private $thumbUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="members_count", type="integer", nullable=false)
     */
    private $membersCount;


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
     * Set tableName
     *
     * @param string $tableName
     *
     * @return Tables
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get tableName
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set tableCode
     *
     * @param string $tableCode
     *
     * @return Tables
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
     * Set description
     *
     * @param string $description
     *
     * @return Tables
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
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return Tables
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
     * Set status
     *
     * @param boolean $status
     *
     * @return Tables
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
     * Set bigUrl
     *
     * @param string $bigUrl
     *
     * @return Tables
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
     * @return Tables
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
     * Set membersCount
     *
     * @param integer $membersCount
     *
     * @return Tables
     */
    public function setMembersCount($membersCount)
    {
        $this->membersCount = $membersCount;

        return $this;
    }

    /**
     * Get membersCount
     *
     * @return integer
     */
    public function getMembersCount()
    {
        return $this->membersCount;
    }
}
