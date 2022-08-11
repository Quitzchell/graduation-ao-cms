ssh_private_key=`cat ~/.ssh/id_rsa`

all:build up

build:
	docker-compose build --build-arg SSH_PRIVATE_KEY="${ssh_private_key}"
up:
	docker-compose up --no-build
