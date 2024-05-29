FROM nginx:stable-alpine

COPY ./nginx.conf /etc/nginx/conf.d/
COPY ./src /usr/share/nginx/html
RUN chmod 0755 -R /usr/share/nginx