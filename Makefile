start:
	$(info Make: Starting container...)
	@docker-compose up $(options)

stop:
	$(info Make: Stopping container...)
	@docker-compose down

install:
	$(info Make: Composer install...)
	@docker-compose run webserver composer install