<?php declare(strict_types=1);

class Video
{
    private string $title;
    private array $ratings = [];
    private bool $isInStore;

    public function __construct(string $title, bool $inStore = true)
    {
        $this->title = strtoupper($title);
        $this->isInStore = $inStore;
    }

    public function rentVideo()
    {
        $this->isInStore = false;

    }

    public function returnToStore()
    {
        $this->isInStore = true;

    }

    public function checkStatus(): bool
    {
        return $this->isInStore;
    }

    public function addRating(int $rating)
    {
        $this->ratings[] = $rating;
    }

    public function getAverageRating(): string
    {
        if (!empty($this->ratings)) {
            return number_format(array_sum($this->ratings) / count($this->ratings), 1);
        }
        return "Not rated";
    }

    public function getTitle(): string
    {
        return $this->title;
    }

}