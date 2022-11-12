up:
	docker-compose up -d
	@echo "Waiting for database to start..."
	@sleep 10
	@echo "ready"

migrate:
		docker exec -it app bash php artisan migrate

run:
	docker exec app php artisan serve &
	docker exec app npm run dev &

permission:
	 docker exec app chmod -R 777 /app/.env
	 docker exec app chmod -Rf 777 bootstrap/cache
	 docker exec app chmod -R 777 /app/public
	 docker exec app chmod -R 777 /app
	 docker exec app chmod -R 777 vendor
