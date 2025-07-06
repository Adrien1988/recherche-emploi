.PHONY: up down lint test

up:
	docker compose up -d

down:
	docker compose down

lint:
	@echo "🔧  lint placeholder – sera implémenté en F-003"

test:
	@echo "🧪  test placeholder – sera implémenté en F-003"
