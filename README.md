> **Portal do Mapas Culturais** is a website that gathers information about *Mapas Culturais* platform, providing institutional information about the project as well serving as plataform for development and support of the project.


## Development setup

### Requirements

Install:

* [Docker](https://www.docker.com/)
* [gettext](https://www.gnu.org/software/gettext/)


### Clone locally and install modules

```
git clone <this repository git url>
cd wp-theme-mapasculturais
bower install
grunt build
# or just "grunt" to watch for changes
```

### Start local server

Change environment variable `ACF_PRO_KEY` with your Advanced Custom Fields Pro Key in `docker-compose.yml`. Then, start the containers:

```shell
  docker-compose up
```

### Populate statistics

```
  docker exec -it wpthememapasculturais_wordpress_1 /usr/local/bin/php /var/www/html/wp-cron.php
```

This step is needed only when running the server with Docker. To use system cron instead of WP Cron, add [cron.conf](cron.conf) to your crontab.

This cron task will add to every user with role "maintainer" and defined "instance_url" the following meta properties, which contain time series of elements count: `events_count`, `spaces_count`, `projects_count` and `agents_count`.

### Debuging

Enable debug at `wp-config.php`:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

To watch debug log file, run:

```shell
  tail -f .data/wp/wp-content/debug.log
```

### Site configuration

Walk through the 5-min install and enable this theme in "Apperance/Themes" at admin panel.
