<?php
require_once "Video.php";
require_once "VideoStore.php";

class Application
{
    function run()
    {
        $store = new VideoStore(new Video('Joker'), new Video('Interstellar'), new Video('Matrix'));
        while (true) {
            echo "________________________________________\n";
            echo "Choose the operation you want to perform \n";
            echo "[1] to EXIT\n";
            echo "[2] to add video to the store inventory\n";
            echo "[3] to list inventory\n";
            echo "[4] to rent a video (as user)\n";
            echo "[5] to return a video (as user)\n";
            echo "[6] to add rating to a video\n";
            echo "________________________________________\n";

            $command = (int)readline();

            switch ($command) {
                case 1:
                    echo "Bye!";
                    die;
                case 2:
                    $title = readline("Video title: ");
                    if (!self::checkIfExists($store, $title)) {
                        $store->addVideoToInventory(new Video($title));
                        echo "Successfully added to the inventory!\n";
                    } else {
                        echo "This video is already in the inventory!\n";
                    }
                    break;
                case 3:
                    $store->listInventory();
                    break;
                case 4:
                    $title = readline("Enter title of the video you want to rent: ");
                    if (self::checkIfExists($store, $title)) {
                        $store->rentVideo($title);
                        echo "Success! Video rented!\n";
                    }else{
                        echo "Sorry, the store doesn't have this video!\n";
                    }
                    break;
                case 5:
                    $title = readline("Enter title of the video you want to return: ");
                    $exists = self::checkIfExists($store, $title);
                    $inStore = self::checkIfInStore($store,$title);
                    if(!$exists){
                        echo "Sorry, the title you want to return doesn't exist!\n";
                        break;
                    }

                    if($inStore){
                        echo "Sorry, the title you want to return is already in store!\n";
                        break;
                    }
                    $store->returnVideo($title);
                    echo "Success! The video has been returned to the store!";
                    break;
                case 6:
                    $title = readline("Enter title of the video you want to rate: ");
                    $rating = (int)readline("Enter rating from 1 to 5: ");
                    if (self::checkIfExists($store, $title) && $rating > 0 && $rating <=5) {
                        $store->addNewRating($rating, $title);
                        echo "Success! Video rated!\n";
                    }else{
                        echo "Invalid video title or rating!\n";
                    }
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function checkIfExists($store, $title): bool
    {
        foreach ($store->getInventory() as $video) {
            if ($video->getTitle() === $title) {
                return true;
            }
        }
        return false;
    }

    private function checkIfInStore ($store, $title): bool{
        foreach ($store->getInventory() as $video) {
            if ($video->getTitle() === $title) {
                return $video->checkStatus();
            }
        }
        return false;
    }
}

(new Application())->run();