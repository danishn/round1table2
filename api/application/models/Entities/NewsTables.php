<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsTables
 *
 * @ORM\Table(name="news-tables", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="table_id", columns={"table_id"})})
 * @ORM\Entity
 */
class NewsTables
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
     * @var \Entities\News
     *
     * @ORM\ManyToOne(targetEntity="Entities\News")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="news_id", referencedColumnName="news_id")
     * })
     */
    private $news;

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
     * Set news
     *
     * @param \Entities\News $news
     *
     * @return NewsTables
     */
    public function setNews(\Entities\News $news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \Entities\News
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set table
     *
     * @param \Entities\Tables $table
     *
     * @return NewsTables
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
