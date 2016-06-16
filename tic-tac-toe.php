<?php
class TicTacToe {

	// all game field
	private static $gameField = [];

	// x field
	private static $xField = [
		0 => [' ', ' ', ' ', ' ', ' ', ' ', ' '],
		1 => [' ', '=', '=', ' ', '=', '=', ' '],
		2 => [' ', ' ', ' ', '=', ' ', ' ', ' '],
		3 => [' ', '=', '=', ' ', '=', '=', ' '],
		4 => [' ', ' ', ' ', ' ', ' ', ' ', ' '],
	];

	// o field
	private static $oField = [
		0 => [' ', ' ', ' ', ' ', ' ', ' ', ' '],
		1 => [' ', '=', '=', '=', '=', '=', ' '],
		2 => [' ', '=', ' ', ' ', ' ', '=', ' '],
		3 => [' ', '=', '=', '=', '=', '=', ' '],
		4 => [' ', ' ', ' ', ' ', ' ', ' ', ' '],
	];

	// computer and player moves
	private static $playerMoves = ['0' => [], '1' => []];

	// winner fields
	private static $winnerFields = [
		[1, 2, 3], [4, 5, 6], [7, 8, 9], [1, 4, 7],
		[2, 5, 8], [3, 6, 9], [1, 5, 9], [3, 5, 7],
	];

	// init function
	public static function init() {
		self::runGame();
	}

	// show game title
	private static function showTitle() {
		self::clearScreen();

		echo <<<EOD
=========================================================
=========================================================

#####  ##  ## #####    ####   ####   ##   # #####   ####
##  ## ##  ## ##  ##   ##     ##  ## ### ## ##     ##
#####  ###### #####    ## ### ###### ## # # ####    ####
##     ##  ## ##       ##  ## ##  ## ##   # ##         ##
##     ##  ## ##        ####  ##  ## ##   # #####   ####

=========================================================
=========================================================

                                             1 | 2 | 3
                                            --- --- ---
HOW TO PLAY: input number of cell you chose  4 | 5 | 6
                                            --- --- ---
                                             7 | 8 | 9
Chose 0 to exit the game.

=========================================================
=========================================================

EOD;
	}

	// run game
	private static function runGame() {
		self::startNewGame();

		self::drawField();

		// make user move
		self::makeMove(true);
	}

	// initialization of new game
	private static function startNewGame() {
		self::$playerMoves[0] = [];
		self::$playerMoves[1] = [];

		self::$gameField = [
			0  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			1  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			2  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			3  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			4  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			5  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '='],
			6  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '='],
			7  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			8  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			9  => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			10 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			11 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			12 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '='],
			13 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '=', '='],
			14 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			15 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			16 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			17 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
			18 => [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '=', '=', ' ', ' ', ' ', ' ', ' ', ' ', ' '],
		];
	}

	// make move
	private static function makeMove($isUserMove) {

		echo "\nMake your choice: ";

		$userChoice = ($isUserMove === true) ? substr(fgets(STDIN), 0, 1) : self::applyComputerMove();

		// if user input wrong field number make move again
		if (self::checkUserChoice($userChoice) === false) {
			self::drawField();

			self::makeMove($isUserMove);
		}

		$userField = ($isUserMove === true) ? self::$xField : self::$oField;

		// apply user choice to game field
		switch ($userChoice) {
			case 0:
				self::gameOver();

			case 1:
				self::applyMove($userField, 0, 16);
				break;

			case 2:
				self::applyMove($userField, 0, 25);
				break;

			case 3:
				self::applyMove($userField, 0, 34);
				break;

			case 4:
				self::applyMove($userField, 7, 16);
				break;

			case 5:
				self::applyMove($userField, 7, 25);
				break;

			case 6:
				self::applyMove($userField, 7, 34);
				break;

			case 7:
				self::applyMove($userField, 14, 16);
				break;

			case 8:
				self::applyMove($userField, 14, 25);
				break;

			case 9:
				self::applyMove($userField, 14, 34);
				break;
		}

		self::$playerMoves[(int) $isUserMove][] = $userChoice;

		// check for winner
		self::checkWinner($isUserMove);

		// next move
		self::makeMove(!$isUserMove);
	}

	// draw game field
	private static function drawField() {
		self::clearScreen();

		self::showTitle();

		echo "\n";

		foreach (self::$gameField as $line) {
			foreach ($line as $cell) {
				echo $cell;
			}

			echo "\n";
		}
	}

	// draw player move on the game field
	private static function applyMove($field, $xStatrtPosition, $yStartPosition) {
		foreach ($field as $fieldRow) {

			$yCurrentPosition = $yStartPosition;

			foreach ($fieldRow as $fieldCell) {
				self::$gameField[$xStatrtPosition][$yCurrentPosition] = $fieldCell;
				$yCurrentPosition++;
			}

			$xStatrtPosition++;
		}

		self::drawField();
	}

	// check if user choice
	private static function checkUserChoice($userChoice) {
		return (in_array($userChoice, [1,2,3,4,5,6,7,8,9,0]) && array_search($userChoice, array_merge(self::$playerMoves[0], self::$playerMoves[1])) === false);
	}

	// make computer choice
	private static function applyComputerMove() {
		$movesLeft = array_diff([1,2,3,4,5,6,7,8,9], array_merge(self::$playerMoves[0], self::$playerMoves[1]));

		// check if computer or player has 1 move to Win
		foreach (self::$winnerFields as $winnerCombination) {
			$availableMove = [];

			if (count(array_intersect($winnerCombination, self::$playerMoves[0])) == 2) {
				$availableMove = array_diff($winnerCombination, array_intersect($winnerCombination, self::$playerMoves[0]));
			}

			if (count(array_intersect($winnerCombination, self::$playerMoves[1])) == 2) {
				$availableMove = array_diff($winnerCombination, array_intersect($winnerCombination, self::$playerMoves[1]));
			}

			if (count(array_intersect($availableMove, $movesLeft)) != 0) {
					return array_pop($availableMove);
			}
		}

		// take place in center
		if (in_array(5, $movesLeft)) {
			return 5;
		}


		shuffle($movesLeft);

		$computerMove = array_pop($movesLeft);

		return $computerMove;
	}

	// game over
	private static function gameOver($whoWin = -1) {
		sleep(1);

		self::clearScreen();

		if ($whoWin == -1) {
			echo <<<EOD
=========================================================
=========================================================

 ####   ####   ##   # #####   ####  ##  ## #####  #####
 ##     ##  ## ### ## ##     ##  ## ##  ## ##     ##  ##
 ## ### ###### ## # # ####   ##  ## ##  ## ####   #####
 ##  ## ##  ## ##   # ##     ##  ##  ####  ##     ##  ##
  ####  ##  ## ##   # #####   ####    ##   #####  ##  ##

=========================================================
=========================================================

EOD;
		}

		if ($whoWin == 1) {
			echo <<<EOD
=========================================================
=========================================================

    ##  ##  ####  ##  ##  ##   ## ###### ##   ##
     ####  ##  ## ##  ##  ##   ##   ##   ###  ##
      ##   ##  ## ##  ##  ## # ##   ##   ## # ##
      ##   ##  ## ##  ##  #######   ##   ##   ##
      ##    ####   ####    ## ##  ###### ##   ##

=========================================================
=========================================================

EOD;
		}

		if ($whoWin == 0) {
			echo <<<EOD
=========================================================
=========================================================

   ##  ##  ####  ##  ##  ##      ####   ####  #####
    ####  ##  ## ##  ##  ##     ##  ## ##     ##
     ##   ##  ## ##  ##  ##     ##  ##  ####  ####
     ##   ##  ## ##  ##  ##     ##  ##     ## ##
     ##    ####   ####   ######  ####   ####  #####

=========================================================
=========================================================

EOD;
		}

		echo "\n\n Do you want play again (Y/N)? : ";

		$userChoice =  strtolower(substr(fgets(STDIN), 0, 1));

		if ($userChoice == 'y') {
			self::runGame();
		} else {
			exit();
		}

	}

	// check for winner
	private static function checkWinner($isPlayer) {

		foreach (self::$winnerFields as $winnerCombination) {
			if (count(array_intersect($winnerCombination, self::$playerMoves[(int) $isPlayer])) == 3) {
				self::gameOver((int) $isPlayer);
			}
		}

		// no more moves
		if ((count(self::$playerMoves[0]) + count(self::$playerMoves[1])) == 9) {
			self::gameOver();
		}

	}

	// clear screen
	private static function clearScreen() {
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			popen('cls', 'w');
		} else {
			system("clear");
		}
	}

}

TicTacToe::init();
?>
