# Tic Tac Toe 🎲
Tic Tac Toe is a classic game which is played on a 3x3 grid by two players. The objective of the game is to be the first player to achieve three of their symbols (X or O) in a row, whether horizontally, vertically or diagonally.

## How was this built?
This version of Tic Tac Toe was built using Laravel as the foundation, integrating MySQL for the database, and employing Tailwind CSS for the styling of the interface. The game itself incorporates Livewire and Pusher, enabling real-time gameplay for an immersive experience.

## Where can I play?
You can enjoy this version of Tic Tac Toe here: 

## How is this hosted?
Laravel Forge was used to ensure a seamless launch.

## What are the limitations?
As this application was developed quickly, there are known limitations that offer potential for enhancement, including:
- [ ] Optimising for mobile devices to ensure a responsive experience across all platforms.
- [ ] Implementing visual indicators to notify users when a player joins or leaves the game.

## What are the possible future improvements?
By using Laravel as the framework, it allows for a scalable solution to easily be made. In the future, various improvements could be implemented, including:
- [ ] Introducing a comprehensive scoring system to track each player's performance.
- [ ] Organising tournaments with dedicated scoreboards to allow friendly competition.
- [ ] Creating user profiles, to allow players to maintain high scores, and to connect with friends.

## How do I run this locally?
Assuming you have PHP, MySQL, Composer and NPM installed, setting up the game locally should be easy. Just follow these steps:
1. Clone this repository from GitHub.
2. Create a new schema in MySQL.
3. Run `composer install`
4. Run `npm install`
5. Create a Pusher account here, and create a new channel by following the instructions on the site.
6. Copy the `.env.example` into a new file called `.env`, and fill in the relevant fields: `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `PUSHER_APP_ID`, `PUSHER_APP_KEY`, `PUSHER_APP_SECRET`, `PUSHER_APP_CLUSTER`.
6. Run `php artisan migrate`
7. Run `npm run dev`
8. Run `php artisan serve`
9. Congratulations! Your app should now be up and running locally. 🎉

## How do I run the unit tests?
Running tests should be easy, simply run `php artisan test`.
