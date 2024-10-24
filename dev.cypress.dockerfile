FROM cypress/included:13.15.0

WORKDIR /e2e

COPY . .

CMD ["npx", "cypress", "run"]
