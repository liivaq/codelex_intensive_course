<?php
require_once "Video.php";
require_once "VideoStore.php";

class Application
{
    function run()
    {
        $store = new VideoStore(new Video('Joker'), new Video('Interstellar'), new Video('Matrix') );
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "[1] to EXIT\n";
            echo "[2] to fill video store\n";
            echo "[3] to rent video (as user)\n";
            echo "[4] to return video (as user)\n";
            echo "[5] to list inventory\n";
            echo "[6] to add rating\n";

            $command = (int) readline();

            switch ($command) {
                case 1:
                    echo "Bye!";
                    die;
                case 2:
                    $title = readline("Video title: ");
                    $store->addVideoToInventory(new Video($title));
                    break;
                case 3:
                    $title = readline("Enter title of the video you want to rent: ");
                    $store->rentVideo($title);
                    break;
                case 4:
                    $title = readline("Enter title of the video you want to return: ");
                    $store->returnVideo($title);
                    break;
                case 5:
                    $store->listInventory();
                    break;
                case 6:
                    $title = readline("Enter title of the video you want to rate: ");
                    $rating = (int) readline("Enter rating from 1 to 5: ");
                    $store->addNewRating($rating, $title);
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }
}

(new Application())->run();