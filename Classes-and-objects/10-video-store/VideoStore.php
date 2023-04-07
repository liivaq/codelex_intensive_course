<?php

class VideoStore
{
    private array $inventory;

    function __construct(...$videos)
    {
        foreach ($videos as $video) {
            $this->inventory[] = $video;
        }
    }

    function getInventory():array{
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
        };
    }

    function addNewRating(int $rating, string $videoTitle)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $videoTitle) {
                $video->addRating($rating);
            }
        };
    }

    function listInventory()
    {
        foreach ($this->inventory as $video) {
            echo $video->getTitle() . " | Average rating: " . $video->getAverageRating() . " | ";
            if ($video->checkStatus()) {
                echo "In Store" . PHP_EOL;
            } else {
                echo "Not in Store" . PHP_EOL;
            }
        }
    }
}