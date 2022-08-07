install:
	cp --no-clobber .env.dist .env
	docker-compose build
	docker-compose run php composer install
up:
	docker-compose up -d