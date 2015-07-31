<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventTables
 *
 * @ORM\Table(name="event_tables", indexes={@ORM\Index(name="event_id", columns={"event_id"}), @ORM\Index(name="table_id", columns={"table_id"}), @ORM\Index(name="table_id_2", columns={"table_id"}), @ORM\Index(name="table_id_3", columns={"table_id"})})
 * @ORM\Entity
 */
class EventTables
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
     * @ORM\Column(name="event_id", type="integer", nullable=false)
     */
    private $eventId;

    /**
     * @var integer
     *
     * @ORM\Column(name="table_id", type="integer", nullable=false)
     */
    private $tableId;


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
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return EventTables
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
     * Set tableId
     *
     * @param integer $tableId
     *
     * @return EventTables
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
}
