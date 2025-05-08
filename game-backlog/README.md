# game-backlog
A testing project with a backend and a frontend, in docker.


1. Create `.env` with `cp .env.example .env`
2. Start `docker compose up -d`
3. Install Laravel Dependencies:
    ```
    docker compose exec workspace bash
    composer install
    npm install
    npm run dev
    ```
4. Run Migrations: `docker compose exec workspace php artisan` migrate
5. Access the Application: Open your browser and navigate to http://localhost.

## Usage

Here are some common commands and tips for using the development environment:

### Accessing the Workspace Container

The workspace sidecar container includes Composer, Node.js, NPM, and other tools necessary for Laravel development (e.g. assets building).

```bash
docker compose exec workspace bash
```

### Run Artisan Commands:

```bash
docker compose exec workspace php artisan migrate
```

### Rebuild Containers:

```bash
docker compose up -d --build
```

### Stop Containers:

```bash
docker compose down
```

### View Logs:

```bash
docker compose logs -f
```

For specific services, you can use:

```bash
docker compose logs -f web
```
