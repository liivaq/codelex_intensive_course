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

    public function rent()
    {
        $this->isInStore = false;
    }

    public function return()
    {
        $this->isInStore = true;
    }

    public function checkStatus(): bool
    {
        return $this->isInStore;
    }

    public function rate(int $rating)
    {
        $this->ratings[] = $rating;
    }

    public function getAverageRating(): float
    {
        if(count($this->ratings) === 0){
            return 0;
        }
        return array_sum($this->ratings) / count($this->ratings);

    }

    public function getTitle(): string
    {
        return $this->title;
    }

}