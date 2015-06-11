<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventTables
 *
 * @ORM\Table(name="event-tables", indexes={@ORM\Index(name="event_id", columns={"event_id"}), @ORM\Index(name="table_id", columns={"table_id"}), @ORM\Index(name="table_id_2", columns={"table_id"}), @ORM\Index(name="table_id_3", columns={"table_id"})})
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
     * @var \Entities\Events
     *
     * @ORM\ManyToOne(targetEntity="Entities\Events")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event_id", referencedColumnName="event_id")
     * })
     */
    private $event;

    /**
     * @var \Entities\Tables
     *
     * @ORM\ManyToOne(targetEntity="Entities\Tables")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="table_id", referencedColumnName="table_id")
     * })
     */
    private $table;


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
     * Set event
     *
     * @param \Entities\Events $event
     *
     * @return EventTables
     */
    public function setEvent(\Entities\Events $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Entities\Events
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set table
     *
     * @param \Entities\Tables $table
     *
     * @return EventTables
     */
    public function setTable(\Entities\Tables $table = null)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Get table
     *
     * @return \Entities\Tables
     */
    public function getTable()
    {
        return $this->table;
    }
}
