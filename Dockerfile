FROM wordpress

RUN apt-get update && apt-get install -y cron

COPY cron.conf /

RUN crontab /cron.conf
