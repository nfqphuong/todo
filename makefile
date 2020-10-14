.PHONY: dev remove-infras init
DB_CONTAINER?=todo_db

dev:


remove-infras:
	docker-compose stop; docker-compose  rm -f

init: remove-infras
	@docker-compose  up -d
	@echo "Waiting for database connection..."
	@while ! docker exec $(DB_CONTAINER) mysqlcheck -u todo_user -ptodo_pass todo &> /dev/null; do \
		sleep 1; \
	done
	php migration.php