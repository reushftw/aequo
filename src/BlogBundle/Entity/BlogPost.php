<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\BlogPostRepository")
 * @Vich\Uploadable
 */
class BlogPost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=255)
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(name="title_fr", type="string", length=255)
     */
    private $titleFr;

    /**
     * @var string
     *
     * @ORM\Column(name="description_en", type="text")
     */
    private $descriptionEn;

    /**
     * @var string
     *
     * @ORM\Column(name="description_fr", type="text")
     */
    private $descriptionFr;

    /**
     * @var string
     *
     * @ORM\Column(name="content_en", type="text")
     */
    private $contentEn;

    /**
     * @var string
     *
     * @ORM\Column(name="content_fr", type="text")
     */
    private $contentFr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_date", type="datetime")
     */
    private $postDate;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="user_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean", length=255, nullable=true)
     * @var bool
     */
    private $enabled;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titleEn
     *
     * @param string $titleEn
     *
     * @return BlogPost
     */
    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    /**
     * Get titleEn
     *
     * @return string
     */
    public function getTitleEn()
    {
        return $this->titleEn;
    }

    /**
     * Set titleFr
     *
     * @param string $titleFr
     *
     * @return BlogPost
     */
    public function setTitleFr($titleFr)
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    /**
     * Get titleFr
     *
     * @return string
     */
    public function getTitleFr()
    {
        return $this->titleFr;
    }

    /**
     * Set descriptionEn
     *
     * @param string $descriptionEn
     *
     * @return BlogPost
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set descriptionFr
     *
     * @param string $descriptionFr
     *
     * @return BlogPost
     */
    public function setDescriptionFr($descriptionFr)
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    /**
     * Get descriptionFr
     *
     * @return string
     */
    public function getDescriptionFr()
    {
        return $this->descriptionFr;
    }

    /**
     * Set contentEn
     *
     * @param string $contentEn
     *
     * @return BlogPost
     */
    public function setContentEn($contentEn)
    {
        $this->contentEn = $contentEn;

        return $this;
    }

    /**
     * Get contentEn
     *
     * @return string
     */
    public function getContentEn()
    {
        return $this->contentEn;
    }

    /**
     * Set contentFr
     *
     * @param string $contentFr
     *
     * @return BlogPost
     */
    public function setContentFr($contentFr)
    {
        $this->contentFr = $contentFr;

        return $this;
    }

    /**
     * Get contentFr
     *
     * @return string
     */
    public function getContentFr()
    {
        return $this->contentFr;
    }

    /**
     * Set postDate
     *
     * @param \DateTime $postDate
     *
     * @return BlogPost
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;

        return $this;
    }

    /**
     * Get postDate
     *
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }
}

