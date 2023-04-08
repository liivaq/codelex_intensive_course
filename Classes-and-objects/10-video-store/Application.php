<?php declare(strict_types=1);
require_once 'Video.php';
require_once 'VideoStore.php';

class Application
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore(new Video('Matrix'), new Video('Interstellar'), new Video('Joker'));
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
                    echo '*** Thanks for using The Vide Store! Hope to see you again soon ***' . PHP_EOL;
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
        $title = strtoupper(readline('Video title: '));
        if ($this->store->checkIfExists($title)) {
            return '*** This video is already in the inventory! ***' . PHP_EOL;
        }
        $this->store->addVideoToInventory(new Video($title));
        return '*** Successfully added to the inventory! ***' . PHP_EOL;
    }

    private function rentVideo(): string
    {
        $title = strtoupper(readline('Enter title of the video you want to rent: '));
        if (!$this->store->checkIfExists($title)) {
            return '*** Sorry, the store does not have this video! ***' . PHP_EOL;

        }
        if (!$this->store->checkIfInStore($title)) {
            return '*** Sorry, this video is not in store at the moment! ***' . PHP_EOL;
        }
        $this->store->rentVideo($title);
        return '*** Success! Video rented! ***' . PHP_EOL;
    }

    private function returnVideo(): string
    {
        $title = strtoupper(readline('Enter title of the video you want to return: '));
        if ($this->store->checkIfInStore($title)) {
            return '*** Sorry, the video you want to return has been returned already! ***' . PHP_EOL;
        }

        if (!$this->store->checkIfExists($title)) {
            return '*** Sorry, this video does not exist! Check your spelling. ***' . PHP_EOL;
        }

        $this->store->returnVideo($title);
        return '*** Success! The video has been returned to the store! ***' . PHP_EOL;

    }

    private function addRating(): string
    {
        $title = null;
        while ($title === null) {
            $userInput = strtoupper(readline('Enter title of the video you want to rate: '));
            if (!$this->store->checkIfExists($userInput)) {
                echo '*** Sorry, this video does not exist - check your spelling! ***' . PHP_EOL;
                continue;
            }
            $title = $userInput;
        }

        $rating = null;
        while ($rating === null) {
            $userInput = (int)readline('Enter rating from 1 to 5: ');
            if ($userInput <= 0 || $userInput > 5) {
                echo '*** Invalid rating. Please input rating from 1 to 5 ***' . PHP_EOL;
                continue;
            }
            $rating = $userInput;
        }

        $this->store->addNewRating($rating, $title);
        return '*** Success! Rating added ***' . PHP_EOL;

    }

    private function listInventory()
    {
        echo '———————————————————————————————————————————' . PHP_EOL;
        foreach ($this->store->getInventory() as $video) {
            echo " » " . $video->getTitle() . " « " . "\n  Average rating: " . $video->getAverageRating() . "\n  Status: ";
            if ($video->checkStatus()) {
                echo "In Store" . PHP_EOL;
            } else {
                echo "Not in Store" . PHP_EOL;
            }
        }
        echo '———————————————————————————————————————————' . PHP_EOL;

    }
}

(new Application())->run();