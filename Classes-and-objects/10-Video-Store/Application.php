<?php declare(strict_types=1);
require_once 'Video.php';
require_once 'VideoStore.php';

class Application
{
    private VideoStore $store;

    public function __construct(VideoStore $store)
    {
        $this->store = $store;
    }

    function run()
    {
        echo 'Welcome to The Video Store!' . PHP_EOL;
        while (true) {
            echo '———————————————————————————————————————————' . PHP_EOL;
            echo '[1] to EXIT' . PHP_EOL;
            echo '[2] to add video to the store inventory' . PHP_EOL;
            echo '[3] to list inventory' . PHP_EOL;
            echo '[4] to rent a video' . PHP_EOL;
            echo '[5] to return a video ' . PHP_EOL;
            echo '[6] to add rating to a video' . PHP_EOL;
            echo '———————————————————————————————————————————' . PHP_EOL;

            $command = (int)readline('Select your choice: ');

            switch ($command) {
                case 1:
                    echo '*** Thanks for using The Video Store! Hope to see you again soon ***' . PHP_EOL;
                    exit;
                case 2:
                    echo $this->addVideo();
                    break;
                case 3:
                    $this->listInventory();
                    break;
                case 4:
                    echo $this->rentVideo();
                    break;
                case 5:
                    echo $this->returnVideo();
                    break;
                case 6:
                    echo $this->addRating();
                    break;
                default:
                    echo '*** Sorry, I don\'t understand you... ***' . PHP_EOL;
            }
        }
    }

    private function addVideo(): string
    {
        $title = trim(strtoupper(readline('Video title: ')));
        if ($this->store->checkIfExists($title)) {
            return '*** ' . $title . ' is already in the inventory! ***' . PHP_EOL;
        }
        $this->store->addVideoToInventory(new Video($title));
        return '*** ' . $title . ' successfully added to the inventory! ***' . PHP_EOL;
    }

    private function rentVideo(): string
    {
        $this->listInventory();
        $index = (int)readline('Enter ID of the video you want to rent: ');
        $inventory = $this->store->getInventory();
        if (!isset($inventory[$index])) {
            return "*** This video doesn't exist. Check entered ID. ***" . PHP_EOL;
        }
        /** @var Video $video */
        $video = $inventory[$index];

        $video->rent();
        return '*** Success! ' . $video->getTitle() . ' rented! ***' . PHP_EOL;
    }

    private function returnVideo(): string
    {
        $videos = [];
        /** @var Video $video */
        foreach ($this->store->getInventory() as $index => $video) {
            if (!$video->checkStatus()) {
                $videos[$index] = $video;
            }
        }
        if (count($videos) === 0) {
            return "*** There are no videos to return! ***" . PHP_EOL;
        }
        echo 'Videos to return: ' . PHP_EOL;
        foreach ($videos as $index => $video) {
            echo "[$index] » " . $video->getTitle() . ' « ' . PHP_EOL;
        }
        $index = readline('Enter ID of the video you want to return: ');

        $video = $this->store->getInventory()[$index];
        $video->return();
        return '*** Success! ' . $video->getTitle() . ' has been returned to the store! ***' . PHP_EOL;

    }

    private function addRating(): string
    {
        $this->listInventory();
        $index = (int)readline('Enter ID of the video you want to rate: ');

        if (!isset($this->store->getInventory()[$index])) {
            return "*** This video doesn't exist. Check entered ID. ***" . PHP_EOL;
        }

        $video = $this->store->getInventory()[$index];

        $rating = null;
        while ($rating === null) {
            $userInput = (int)round((float)trim(readline('Enter rating from 1 to 5: ')));
            if ($userInput <= 0 || $userInput > 5) {
                echo '*** Invalid rating. Please input rating from 1 to 5 ***' . PHP_EOL;
                continue;
            }
            $rating = $userInput;
        }

        $video->rate($rating);
        return '*** Success! Rating of ' . $rating . ' added to ' . $video->getTitle() . ' ***' . PHP_EOL;

    }

    private function listInventory()
    {
        echo '———————————————————————————————————————————' . PHP_EOL;
        /** @var Video $video */
        foreach ($this->store->getInventory() as $index => $video) {
            echo "[$index] » " . $video->getTitle() . ' «' . PHP_EOL;
            echo '   Average rating: ' . number_format($video->getAverageRating(), 1);
            echo ' | Status: ';
            if ($video->checkStatus()) {
                echo 'In Store' . PHP_EOL;
            } else {
                echo 'Not in Store' . PHP_EOL;
            }
        }
        echo '———————————————————————————————————————————' . PHP_EOL;

    }

}