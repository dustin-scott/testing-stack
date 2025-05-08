# game-backlog
A testing project with a backend and a fronend, in docker.


#Start
docker compose -f compose.dev.yaml up -d

#Install Laravel Dependencies:
docker compose -f compose.dev.yaml exec workspace bash
composer install
npm install
npm run dev

#Run Migrations:
docker compose -f compose.dev.yaml exec workspace php artisan migrate

#Access the Application:
Open your browser and navigate to http://localhost.

## Usage

Here are some common commands and tips for using the development environment:

### Accessing the Workspace Container

The workspace sidecar container includes Composer, Node.js, NPM, and other tools necessary for Laravel development (e.g. assets building).

```bash
docker compose -f compose.dev.yaml exec workspace bash
```

### Run Artisan Commands:

```bash
docker compose -f compose.dev.yaml exec workspace php artisan migrate
```

### Rebuild Containers:

```bash
docker compose -f compose.dev.yaml up -d --build
```

### Stop Containers:

```bash
docker compose -f compose.dev.yaml down
```

### View Logs:

```bash
docker compose -f compose.dev.yaml logs -f
```

For specific services, you can use:

```bash
docker compose -f compose.dev.yaml logs -f web
```
