up:
	docker-compose up -d
	@echo "Waiting for database to start..."
	@sleep 10
	@echo "ready"

migrate:
		docker exec -it app bash php artisan migrate

run:
	php artisan serve &
	npm run dev &

