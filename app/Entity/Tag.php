<?php
declare(strict_types=1);

namespace App\Entity;

final class Tag
{
    private $id;
    /** @var string */
    private $tagName;

    /**
     * Tag constructor.
     *
     * @param string $tagName
     */
    public function __construct(int $id, string $tagName)
    {
        $this->id = $id;
        $this->tagName = $tagName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->tagName;
    }
}
