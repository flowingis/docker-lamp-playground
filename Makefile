start:
	$(info Make: Starting container...)
	@docker-compose up

stop:
	$(info Make: Stopping container...)
	@docker-compose down