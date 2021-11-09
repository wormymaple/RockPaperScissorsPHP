<?php
// Arrays that contain choice information //
$choices = ["rock", "paper", "scissors"];
$wins = ["scissors", "rock", "paper"];
$winStatements = ["smashes", "covers", "cuts"];

$playing = true;

while ($playing){
    // Print selection menu
    echo "1 - Rock\r\n2 - Paper\r\n3 - Scissors\r\nInput: ";

    $gameEnded = false; // Tracks wether or not someone has won //
    
    $input = readline() - 1; // Gets player choice and checks whether or not it is valid //
    if ($input < 4 && $input > -1){
        echo "\r\nChoice: $choices[$input]\r\n";

        $cpuChoice = mt_rand(1, 3) - 1; // Gets cpu choice //

        echo "CPU Choice: $choices[$cpuChoice]\r\n\r\n";

        // Checks if the outcome is a draw //
        if ($input == $cpuChoice){
            echo "Welp, looks like a draw!\r\n";
        }
        // Checks if the player wins //
        else if ($input == array_search($choices[$cpuChoice], $wins)){
            echo "YOU WIN, $choices[$input]  $winStatements[$input]  $choices[$cpuChoice]!\r\n\r\n";
            $gameEnded = true;
        }
        else {
            echo "CPU WINS, $choices[$cpuChoice]  $winStatements[$cpuChoice]  $choices[$input]!\r\n\r\n";
            $gameEnded = true;
        }

        // If there is an outcome in which someone wins, ask to play again //
        if ($gameEnded) {
            // Gets play again choice //
            echo "Would you like to play again (y/n): ";
            $choice = readline();
        
            if ($choice == "y"){
                echo "\r\n";
                continue;
            }
            else {
                // Ends game //
                echo "Thanks for playing!\r\n";
                $playing = false;
            }
        }
    }
    else {
        echo "That wasn't a choice!\r\n\r\n";
        continue;
    }
}
?>