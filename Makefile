ssh_private_key=`cat ~/.ssh/id_rsa`
project_name=$(notdir $(shell pwd))

.PHONY: all
all:build up

.PHONY: build
build:
	PROJECT_NAME="$(project_name)" docker compose build --build-arg SSH_PRIVATE_KEY="${ssh_private_key}"

.PHONY: up
up:
	PROJECT_NAME="$(project_name)" docker compose up --no-build

.PHONY: login-front
login-front:
	docker exec -it "$(project_name)-frontend-1" /bin/sh

.PHONY: login-back
login-back:
	docker exec -it "$(project_name)-backend-1" /bin/sh
