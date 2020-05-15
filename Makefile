start:
	$(info Make: Starting container...)
	@docker-compose up $(opt)

stop:
	$(info Make: Stopping container...)
	@docker-compose down

install:
	$(info Make: Composer install...)
	@docker-compose run webserver composer install

require:
	$(info Make: Composer require...)
	@docker-compose run webserver composer require $(pkg)

routes:
	$(info Make: Debug Router...)
	@docker-compose run webserver bin/console debug:router

test:
	$(info Make: Execute Test...)
	@docker-compose run webserver bin/phpunit

entity:
	$(info Make: Create New Entity...)
	@docker-compose run webserver bin/console make:entity

migration:
	$(info Make: Create Migration...)
	@docker-compose run webserver bin/console make:migration

migrate:
	$(info Make: Create Migration...)
	@docker-compose run webserver bin/console doctrine:migrations:migrate

fixtures:
	$(info Make: Load Fixtures...)
	@docker-compose run webserver bin/console doctrine:fixtures:load

setup: install migrate

setupdev: setup fixtures


