FROM cypress/included:13.15.0

# Install dependencies
RUN apt-get update && \
    apt-get install -y wget gnupg2 chromium --no-install-recommends && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Set the necessary environment variables for Cypress
ENV CHROME_BIN=/usr/bin/chromium-browser
ENV PUPPETEER_SKIP_DOWNLOAD=true


WORKDIR /e2e

COPY . .

CMD ["npx", "cypress", "run", "-b", "chromium"]
