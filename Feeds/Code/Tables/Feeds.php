<?php

namespace Games\Feeds\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feeds
 *
 * @ORM\Table(name="games_feeds", indexes={@ORM\Index(name="category_id_index", columns={"category_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Feeds extends \Kazist\Table\BaseTable {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="limit", type="integer", length=11, nullable=true)
     */
    protected $limit;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", length=11, nullable=true)
     */
    protected $category_id;

    /**
     * @var string
     *
     * @ORM\Column(name="feed_url", type="string", length=255, nullable=true)
     */
    protected $feed_url;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_processed", type="integer", length=11, nullable=true)
     */
    protected $is_processed;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=true)
     */
    protected $published;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=false)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=false)
     */
    protected $modified_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    protected $date_modified;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Feeds
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Feeds
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set limit
     *
     * @param integer $limit
     * @return Feeds
     */
    public function setLimit($limit) {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Get limit
     *
     * @return integer 
     */
    public function getLimit() {
        return $this->limit;
    }

    /**
     * Set category_id
     *
     * @param integer $categoryId
     * @return Feeds
     */
    public function setCategoryId($categoryId) {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId() {
        return $this->category_id;
    }

    /**
     * Set feed_url
     *
     * @param string $feedUrl
     * @return Feeds
     */
    public function setFeedUrl($feedUrl) {
        $this->feed_url = $feedUrl;

        return $this;
    }

    /**
     * Get feed_url
     *
     * @return string 
     */
    public function getFeedUrl() {
        return $this->feed_url;
    }

    /**
     * Set is_processed
     *
     * @param integer $isProcessed
     * @return Feeds
     */
    public function setIsProcessed($isProcessed) {
        $this->is_processed = $isProcessed;

        return $this;
    }

    /**
     * Get is_processed
     *
     * @return integer 
     */
    public function getIsProcessed() {
        return $this->is_processed;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Feeds
     */
    public function setPublished($published) {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return integer 
     */
    public function getPublished() {
        return $this->published;
    }

    /**
     * Get created_by
     *
     * @return integer 
     */
    public function getCreatedBy() {
        return $this->created_by;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * Get modified_by
     *
     * @return integer 
     */
    public function getModifiedBy() {
        return $this->modified_by;
    }

    /**
     * Get date_modified
     *
     * @return \DateTime 
     */
    public function getDateModified() {
        return $this->date_modified;
    }

}
