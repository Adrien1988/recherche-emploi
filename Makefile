.PHONY: up down logs

up:
	@if [ ! -f .env ]; then cp .env.dist .env; fi
	docker compose up -d --build

down:
	docker compose down -v

logs:
	docker compose logs -f --tail=100

test:
	docker compose exec -e APP_ENV=test -w /var/www/app \
		php vendor/bin/simple-phpunit -v

db-reset:
	docker compose down -v
	docker compose up -d
