FROM node:20-alpine

RUN mkdir -p /var/www/html
COPY ./src/frontend/ /var/www/html

WORKDIR /var/www/html

RUN npm install

CMD ["npm", "run", "dev"]
