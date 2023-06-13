<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TicTacToe extends Component
{
    /**
     * The Tic Tac Toe Board (3 x 3 array). Initialised to an empty array.
     *
     * @var string[][]
     */
    public $board = [
        ['', '', ''],
        ['', '', ''],
        ['', '', '']
    ];

    /**
     * The current token. Initialised to 'X'.
     *
     * @var string
     */
    public $currentToken = 'X';

    /**
     * The current player. Initialised to 1.
     *
     * @var int
     */
    public $currentPlayer = 1;

    /**
     * Check to see if there is a current winner.
     *
     * @var bool
     */
    public $winner = false;

    /**
     * Check to see if there is a draw.
     *
     * @var bool
     */
    public $draw = false;

    /**
     * The number of tokens played
     * @var int
     */
    public $count = 0;

    /**
     * Play a token on the board
     *
     * @param $x
     * @param $y
     */
    public function playToken($x, $y)
    {
        // Update the number of tokens that have been played
        $this->count++;

        // Set the board to the relevant token
        $this->board[$x][$y] = $this->currentToken;

        // Check to see if there is a winner
        $this->winner = $this->checkWin();

        // If all 9 tokens have been played & there is no winner set draw to true
        if ($this->count >= 9 && !$this->winner) {
            $this->draw = true;
        }

        // If there is no winner or draw, swap the current player and token
        if (!$this->winner && !$this->draw) {
            $this->currentPlayer = $this->currentPlayer == 1 ? 2 : 1;
            $this->currentToken = $this->currentToken == 'X' ? 'O' : 'X';
        }

    }

    /**
     * Check the rows, columns and diagonals for a wine
     *
     * @return bool|null
     */
    function checkWin() {
        $numRows = count($this->board);
        $numCols = count($this->board[0]);

        // Check rows
        for ($row = 0; $row < $numRows; $row++) {
            if ($this->board[$row][0] !== '') {
                $foundWin = true;
                for ($col = 1; $col < $numCols; $col++) {
                    if ($this->board[$row][$col] !== $this->board[$row][0]) {
                        $foundWin = false;
                        break;
                    }
                }
                if ($foundWin) {
                    return $foundWin;
                }
            }
        }

        // Check columns
        for ($col = 0; $col < $numCols; $col++) {
            if ($this->board[0][$col] !== '') {
                $foundWin = true;
                for ($row = 1; $row < $numRows; $row++) {
                    if ($this->board[$row][$col] !== $this->board[0][$col]) {
                        $foundWin = false;
                        break;
                    }
                }
                if ($foundWin) {
                    return $foundWin;
                }
            }
        }

        // Check diagonals
        if ($this->board[0][0] !== '') {
            $foundWin = true;
            for ($i = 1; $i < $numRows; $i++) {
                if ($this->board[$i][$i] !== $this->board[0][0]) {
                    $foundWin = false;
                    break;
                }
            }
            if ($foundWin) {
                return $foundWin;
            }
        }

        if ($this->board[0][$numCols - 1] !== '') {
            $foundWin = true;
            for ($i = 1; $i < $numRows; $i++) {
                if ($this->board[$i][$numCols - 1 - $i] !== $this->board[0][$numCols - 1]) {
                    $foundWin = false;
                    break;
                }
            }
            if ($foundWin) {
                return $foundWin;
            }
        }

        return null;
    }

    /**
     * Return the Livewire component to the game view
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.tic-tac-toe');
    }
}
