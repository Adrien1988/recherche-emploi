.PHONY: up down logs

up:
	@if [ ! -f .env ]; then cp .env.dist .env; fi
	docker compose up -d --build

down:
	docker compose down -v

logs:
	docker compose logs -f --tail=100
