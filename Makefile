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