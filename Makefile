up:
	docker-compose up -d
	@echo "ready"

migrate:
		docker exec -it app php artisan migrate

run:
	php artisan serve &
	npm run dev &

