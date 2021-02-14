dc-setup: dc-build dc-up dc-install dc-migrate

dc-build:
	docker-compose build \
		--no-cache \
		--parallel \
		--pull

dc-up:
	docker-compose up -d

dc-migrate: dc-up
	docker-compose exec app php artisan migrate

dc-test:
	docker-compose exec app ./vendor/bin/phpunit

dc-tinker:
	docker-compose exec app php artisan tinker

dc-clear-cache:
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan cache:clear
