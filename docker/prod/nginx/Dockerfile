FROM node:18-alpine AS node
WORKDIR /source
COPY . .
RUN yarn install
RUN yarn build

FROM nginx:alpine
WORKDIR /var/www/html
RUN apk update && apk add --no-cache \
    tzdata
COPY docker/prod/nginx/default.conf /etc/nginx/conf.d
COPY . .
COPY --from=node /source/public/build ./public/build
RUN ln -s /var/www/html/storage/app/public /var/www/html/public/storage