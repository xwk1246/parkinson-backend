FROM node:18-alpine AS node
WORKDIR /var/www/html
RUN yarn install

FROM nginx:alpine
WORKDIR /var/www
COPY docker/test/nginx/default.conf /etc/nginx/conf.d
