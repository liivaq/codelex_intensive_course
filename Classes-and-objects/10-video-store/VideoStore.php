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

    function rentVideo(string $videoTitle)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $videoTitle) {
                $video->rentVideo();
            }
        }
    }

    function returnVideo(string $videoTitle)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $videoTitle) {
                $video->returnToStore();
            }
        }
    }

    function addNewRating(int $rating, string $videoTitle)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $videoTitle) {
                $video->addRating($rating);
            }
        }
    }

    public function checkIfInStore($title): bool
    {
        foreach ($this->getInventory() as $video) {
            if ($video->getTitle() === $title) {
                return $video->checkStatus();
            }
        }
        return false;
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