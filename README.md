The coding backend and frontend are inside game-backlog see [here](game-backlog/README.md) for more details

# Setup

1. Create `game-backlog/.env` with `cd game-backlog/ && cp .env.example .env`
2. Start `cd ../ && docker compose up -d`
3. Install Laravel Dependencies:
    ```
    docker compose exec workspace bash
    composer install
    php artisan migrate
    npm install
    npm run dev
    ```
4. Access the Application: Open your browser and navigate to http://localhost.
