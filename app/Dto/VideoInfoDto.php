<?php

namespace App\Dto;

class VideoInfoDto
{
    public function __construct(
        protected string $title,
        protected ?string $description = null,
        protected ?string $thumbnailUrl = null,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }
}
