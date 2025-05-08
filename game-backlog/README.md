# game-backlog
A testing project with a backend and a frontend, in docker.

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
