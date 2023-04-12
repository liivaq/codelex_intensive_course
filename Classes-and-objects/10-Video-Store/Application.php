<?php declare(strict_types=1);
require_once 'Video.php';
require_once 'VideoStore.php';
require_once 'Customer.php';

class Application
{
    private VideoStore $store;
    private Customer $customer;

    public function __construct(VideoStore $store)
    {
        $this->store = $store;
    }

    function run()
    {
        echo '———————————————————————————————————————————' . PHP_EOL;
        echo '[1] to enter the Store as a NEW Customer' . PHP_EOL;
        echo '[2] to enter the Store as returning Customer' . PHP_EOL;
        echo '[3] to enter the Store as Staff' . PHP_EOL;
        echo '[4] to exit store' . PHP_EOL;

        $userInput = (int)readline('Choose: ');

        switch ($userInput) {
            case 1:
                echo $this->createUser();
                break;
            case 2:
                $username = readline("Enter your username: ");
                $customer = $this->store->getCustomerByUsername($username);
                $this->customer($customer);
                break;
            case 3:
                $this->staff();
                break;
            case 4:
                echo "Bye!";
                exit;
            default:
                echo 'I do not understand you!';
        }
    }

    private function customer($customer)
    {
        $this->customer = $customer;
        while (true) {
            echo '———————————————————————————————————————————' . PHP_EOL;
            echo '[1] to return to Main Menu' . PHP_EOL;
            echo '[2] to rent a video' . PHP_EOL;
            echo '[3] to return a video ' . PHP_EOL;
            echo '[4] to add rating to a video' . PHP_EOL;
            echo '[5] to see videos in your inventory' . PHP_EOL;
            echo '———————————————————————————————————————————' . PHP_EOL;

            $userInput = (int)readline('Select your choice: ');

            switch ($userInput) {
                case 1:
                    $this->run();
                    break;
                case 2:
                    echo $this->rentVideo();
                    break;
                case 3:
                    echo $this->returnVideo();
                    break;
                case 4:
                    echo $this->addRating();
                    break;
                case 5:
                    $this->customerInventory();
                    break;
                default:
                    echo '*** Sorry, I don\'t understand you... ***' . PHP_EOL;
            }
        }
    }

    private function staff()
    {
        while (true) {
            echo '———————————————————————————————————————————' . PHP_EOL;
            echo '[1] return to Main Menu' . PHP_EOL;
            echo '[2] to add video to the store inventory' . PHP_EOL;
            echo '[3] to list inventory' . PHP_EOL;
            echo '[4] to see Customer list' . PHP_EOL;
            echo '———————————————————————————————————————————' . PHP_EOL;

            $command = (int)readline('Select your choice: ');

            switch ($command) {
                case 1:
                    $this->run();
                    break;
                case 2:
                    echo $this->addVideo();
                    break;
                case 3:
                    $this->listInventory();
                    break;
                case 4:
                    $this->seeCustomers();
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
        echo "Videos available in store: ".PHP_EOL;
        $this->listAvailable();
        $index = (int)readline('Enter ID of the video you want to rent: ');
        $inventory = $this->store->getInventory();
        if (!isset($inventory[$index])) {
            return "*** This video doesn't exist. Check entered ID. ***" . PHP_EOL;
        }
        /** @var Video $video */
        $video = $inventory[$index];

        $video->rent();
        $this->customer->takeHome($video);
        return '*** Success! ' . $video->getTitle() . ' rented! ***' . PHP_EOL;
    }

    private function returnVideo(): string
    {
        $inventory = $this->customer->getInventory();
        if (count($inventory) === 0) {
            return "*** You have no videos to return! ***" . PHP_EOL;
        }

        echo 'Videos to return: ' . PHP_EOL;
        foreach ($inventory as $video){
            $index = $this->store->getVideoID($video);
            echo "[$index] {$video->getTitle()}". PHP_EOL;
        }
        $index = readline('Enter ID of the video you want to return: ');

        $video = $this->store->getInventory()[$index];
        $video->return();
        $this->customer->giveBack($video);
        return '*** Success! ' . $video->getTitle() . ' has been returned to the store! ***' . PHP_EOL;

    }

    private function addRating(): string
    {
        $this->listInventory();
        $index = (int)readline('Enter ID of the video you want to rate: ');

        if (!isset($this->store->getInventory()[$index])) {
            return "*** This video doesn't exist. Check entered ID. ***" . PHP_EOL;
        }
        /** @var Video $video */
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
            echo "[$index] » " . $video->getTitle() . ' «';
            echo ' | Average rating: ' . number_format($video->getAverageRating(), 1);
            echo ' | Status: ';
            if ($video->checkStatus()) {
                echo 'In Store' . PHP_EOL;
            } else {
                echo 'Not in Store' . PHP_EOL;
            }
        }
        echo '———————————————————————————————————————————' . PHP_EOL;
    }

    private function listAvailable()
    {
        /** @var Video $video */
        foreach ($this->store->getInventory() as $index => $video) {
            if ($video->checkStatus()) {
                echo "[$index] ". $video->getTitle() . ' | Rating: ' . $video->getAverageRating() . PHP_EOL;
            }
        }
    }

    private function customerInventory()
    {
        echo "Your rented videos: ".PHP_EOL;
        foreach ($this->customer->getInventory() as $video) {
            echo ' -- '.$video->getTitle() . PHP_EOL;
        }
    }

    private function seeCustomers()
    {
        /** @var Customer $customer */
        foreach ($this->store->getCustomers() as $customer) {
            echo 'Customer ID: ' . $customer->getUsername() . PHP_EOL;
            echo 'Videos rented: ' . PHP_EOL;
            foreach ($customer->getInventory() as $video) {
                echo ' -- '.$video->getTitle() . PHP_EOL;
            }
            echo '———————————————————————————————————————————' . PHP_EOL;
        }
    }

    function createUser(): string {
        $username = null;
        while($username === null){
            $input = trim(readline("Create your username: "));
            foreach($this->store->getCustomers() as $customer){
                if ($customer->getUsername() === $input){
                    echo "This user already exists!".PHP_EOL;
                    continue;
                }
                $username = $input;
            }
        }

        $customer = new Customer($username);
        return "User $username successfully created!".$this->customer($customer).PHP_EOL;
    }

}