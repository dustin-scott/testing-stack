The coding backend and frontend are inside game-backlog see [here](game-backlog/README.md) for more details

# Project Setup

1. Create application `game-backlog/.env`
    ```shell
    cd game-backlog/ && cp .env.example .env
    ```
    - If you need to override the user_id and group_id, create a `.env` in the root project directory with these values:
        ```shell
        UID=1234
        GID=1234
        ```
2. Start containers
    ```
    cd ../ && docker compose up -d
    ```
3. Install Laravel dependencies, run Migrations, and install NPM dependencies:
    ```
    docker compose exec workspace bash
    composer install
    php artisan migrate
    npm install
    npm run dev
    ```
4. Access the Application: Open your browser and navigate to http://localhost.
