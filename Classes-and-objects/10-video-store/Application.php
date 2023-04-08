<?php declare(strict_types=1);
require_once 'Video.php';
require_once 'VideoStore.php';

class Application
{
    function run()
    {
        echo 'Welcome to The Video Store!' . PHP_EOL;
        $store = new VideoStore(new Video('Joker'), new Video('Interstellar'), new Video('The Matrix'));
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
                    $title = strtoupper(readline('Video title: '));
                    if ($store->checkIfExists($title)) {
                        echo '*** This video is already in the inventory! ***' . PHP_EOL;
                        break;
                    }
                    $store->addVideoToInventory(new Video($title));
                    echo '*** Successfully added to the inventory! ***' . PHP_EOL;
                    break;
                case 3:
                    $store->listInventory();
                    break;
                case 4:
                    $title = strtoupper(readline('Enter title of the video you want to rent: '));
                    if (!$store->checkIfExists($title)) {
                        echo '*** Sorry, the store does not have this video! ***' . PHP_EOL;
                        break;
                    }
                    if (!$store->checkIfInStore($title)) {
                        echo '*** Sorry, this video is not in store at the moment! ***' . PHP_EOL;
                        break;
                    }
                    $store->rentVideo($title);
                    echo '*** Success! Video rented! ***' . PHP_EOL;
                    break;
                case 5:

                    $title = strtoupper(readline('Enter title of the video you want to return: '));
                    if ($store->checkIfInStore($title)) {
                        echo '*** Sorry, the video you want to return is already in store! ***' . PHP_EOL;
                        break;
                    }

                    if (!$store->checkIfExists($title)) {
                        echo '*** Sorry, this video does not exist! Check your spelling. ***' . PHP_EOL;
                        break;
                    }

                    $store->returnVideo($title);
                    echo '*** Success! The video has been returned to the store! ***' . PHP_EOL;

                    break;
                case 6:
                    $title = null;
                    while ($title === null) {
                        $userInput = strtoupper(readline('Enter title of the video you want to rate: '));
                        if (!$store->checkIfExists($userInput)) {
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

                    $store->addNewRating($rating, $title);
                    echo '*** Success! Rating added ***' . PHP_EOL;
                    break;
                default:
                    echo '*** Sorry, I don\'t understand you... ***' . PHP_EOL;
            }
        }
    }
}

(new Application())->run();