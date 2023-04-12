<?php

class VideoStore
{
    private array $inventory = [];

    function __construct(Video ...$videos)
    {
        array_push($this->inventory, ...$videos);
    }

    function getInventory(): array
    {
        return $this->inventory;
    }

    function addVideoToInventory(Video $video)
    {
        $this->inventory[] = $video;
    }

    public function checkIfExists($title): bool
    {
        foreach ($this->getInventory() as $video) {
            if ($video->getTitle() === $title) {
                return true;
            }
        }
        return false;
    }
}