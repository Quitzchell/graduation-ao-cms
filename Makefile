ssh_private_key=`cat ~/.ssh/id_rsa`
project_name=$(notdir $(shell pwd))

# Define an optional SERVICE variable, defaulting to backend1 if not provided
SERVICE ?= backend-ao

.PHONY: all
all: build up

# Build target that builds the specified service (defaults to backend1 if none specified)
.PHONY: build
build:
	PROJECT_NAME="$(project_name)" docker compose build $(SERVICE) --build-arg SSH_PRIVATE_KEY="${ssh_private_key}"

# Backend-specific build targets for each service
.PHONY: ao filament
ao:
	PROJECT_NAME="$(project_name)" docker compose build backend-ao --build-arg SSH_PRIVATE_KEY="${ssh_private_key}"

filament:
	PROJECT_NAME="$(project_name)" docker compose build backend-filament

.PHONY: up
up:
	PROJECT_NAME="$(project_name)" docker compose up --no-build

.PHONY: cypress
cypress:
	PROJECT_NAME="$(project_name)" docker compose up --build cypress
