<?php

namespace Games\Games\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Games
 *
 * @ORM\Table(name="games_games", indexes={@ORM\Index(name="category_id_index", columns={"category_id"}), @ORM\Index(name="created_by_index", columns={"created_by"}), @ORM\Index(name="modified_by_index", columns={"modified_by"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Games extends \Kazist\Table\BaseTable
{
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
     * @ORM\Column(name="file_type", type="string", length=255, nullable=true)
     */
    protected $file_type;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="category_id", type="integer", length=11, nullable=true)
     */
    protected $category_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="image", type="integer", length=11, nullable=true)
     */
    protected $image;

    /**
     * @var string
     *
     * @ORM\Column(name="fog_id", type="string", length=255, nullable=true)
     */
    protected $fog_id;

    /**
     * @var string
     *
     * @ORM\Column(name="controls", type="string", length=255, nullable=true)
     */
    protected $controls;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=true)
     */
    protected $date_added;

    /**
     * @var string
     *
     * @ORM\Column(name="game_url", type="string", length=255, nullable=true)
     */
    protected $game_url;

    /**
     * @var string
     *
     * @ORM\Column(name="small_thumbnail_url", type="string", length=255, nullable=true)
     */
    protected $small_thumbnail_url;

    /**
     * @var string
     *
     * @ORM\Column(name="med_thumbnail_url", type="string", length=255, nullable=true)
     */
    protected $med_thumbnail_url;

    /**
     * @var string
     *
     * @ORM\Column(name="large_thumbnail_url", type="string", length=255, nullable=true)
     */
    protected $large_thumbnail_url;

    /**
     * @var integer
     *
     * @ORM\Column(name="swf_file", type="integer", length=11, nullable=true)
     */
    protected $swf_file;

    /**
     * @var string
     *
     * @ORM\Column(name="resolution", type="string", length=255, nullable=true)
     */
    protected $resolution;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255, nullable=true)
     */
    protected $tags;

    /**
     * @var integer
     *
     * @ORM\Column(name="hit", type="integer", length=11, nullable=true)
     */
    protected $hit;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=true)
     */
    protected $published;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=true)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=true)
     */
    protected $modified_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    protected $date_modified;


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
     * Set file_type
     *
     * @param string $fileType
     * @return Games
     */
    public function setFileType($fileType)
    {
        $this->file_type = $fileType;

        return $this;
    }

    /**
     * Get file_type
     *
     * @return string 
     */
    public function getFileType()
    {
        return $this->file_type;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Games
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Games
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
     * Set category_id
     *
     * @param integer $categoryId
     * @return Games
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set image
     *
     * @param integer $image
     * @return Games
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return integer 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set fog_id
     *
     * @param string $fogId
     * @return Games
     */
    public function setFogId($fogId)
    {
        $this->fog_id = $fogId;

        return $this;
    }

    /**
     * Get fog_id
     *
     * @return string 
     */
    public function getFogId()
    {
        return $this->fog_id;
    }

    /**
     * Set controls
     *
     * @param string $controls
     * @return Games
     */
    public function setControls($controls)
    {
        $this->controls = $controls;

        return $this;
    }

    /**
     * Get controls
     *
     * @return string 
     */
    public function getControls()
    {
        return $this->controls;
    }

    /**
     * Set date_added
     *
     * @param \DateTime $dateAdded
     * @return Games
     */
    public function setDateAdded($dateAdded)
    {
        $this->date_added = $dateAdded;

        return $this;
    }

    /**
     * Get date_added
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * Set game_url
     *
     * @param string $gameUrl
     * @return Games
     */
    public function setGameUrl($gameUrl)
    {
        $this->game_url = $gameUrl;

        return $this;
    }

    /**
     * Get game_url
     *
     * @return string 
     */
    public function getGameUrl()
    {
        return $this->game_url;
    }

    /**
     * Set small_thumbnail_url
     *
     * @param string $smallThumbnailUrl
     * @return Games
     */
    public function setSmallThumbnailUrl($smallThumbnailUrl)
    {
        $this->small_thumbnail_url = $smallThumbnailUrl;

        return $this;
    }

    /**
     * Get small_thumbnail_url
     *
     * @return string 
     */
    public function getSmallThumbnailUrl()
    {
        return $this->small_thumbnail_url;
    }

    /**
     * Set med_thumbnail_url
     *
     * @param string $medThumbnailUrl
     * @return Games
     */
    public function setMedThumbnailUrl($medThumbnailUrl)
    {
        $this->med_thumbnail_url = $medThumbnailUrl;

        return $this;
    }

    /**
     * Get med_thumbnail_url
     *
     * @return string 
     */
    public function getMedThumbnailUrl()
    {
        return $this->med_thumbnail_url;
    }

    /**
     * Set large_thumbnail_url
     *
     * @param string $largeThumbnailUrl
     * @return Games
     */
    public function setLargeThumbnailUrl($largeThumbnailUrl)
    {
        $this->large_thumbnail_url = $largeThumbnailUrl;

        return $this;
    }

    /**
     * Get large_thumbnail_url
     *
     * @return string 
     */
    public function getLargeThumbnailUrl()
    {
        return $this->large_thumbnail_url;
    }

    /**
     * Set swf_file
     *
     * @param integer $swfFile
     * @return Games
     */
    public function setSwfFile($swfFile)
    {
        $this->swf_file = $swfFile;

        return $this;
    }

    /**
     * Get swf_file
     *
     * @return integer 
     */
    public function getSwfFile()
    {
        return $this->swf_file;
    }

    /**
     * Set resolution
     *
     * @param string $resolution
     * @return Games
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution
     *
     * @return string 
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Games
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set hit
     *
     * @param integer $hit
     * @return Games
     */
    public function setHit($hit)
    {
        $this->hit = $hit;

        return $this;
    }

    /**
     * Get hit
     *
     * @return integer 
     */
    public function getHit()
    {
        return $this->hit;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Games
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return integer 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Get created_by
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Get modified_by
     *
     * @return integer 
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Get date_modified
     *
     * @return \DateTime 
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        // Add your code here
    }
}
