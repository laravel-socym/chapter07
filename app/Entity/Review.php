<?php
declare(strict_types=1);

namespace App\Entity;

/**
 * Class Review
 */
final class Review
{
    private $id;
    private $title;
    private $content;
    private $tags = [];
    private $createdAt;

    /**
     * Review constructor.
     *
     * @param int    $id
     * @param string $title
     * @param string $content
     */
    public function __construct(int $id, string $title, string $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    public function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAtEpoch(): string
    {
        $dateime = new \DateTime($this->createdAt);
        return $dateime->format('U');
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Tag $tag
     */
    public function setTag(Tag $tag)
    {
        $this->tags[] = $tag;
    }

    public function getTags(): array
    {
        return $this->tags;
    }
}
