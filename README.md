> **Portal do Mapas Culturais** is a website that gathers information about *Mapas Culturais* platform, providing institutional information about the project as well serving as plataform for development and support of the project.


## Development setup

### Requirements

Install:

* [Docker](https://www.docker.com/)
* [gettext](https://www.gnu.org/software/gettext/).


### Clone locally and install modules

```
git clone <this repository git url>
cd wp-theme-mapasculturais
bower install
grunt build
# or just "grunt" to watch for changes
```

### Start local server

```shell
  docker-compose up
```

### Init cron service

```
  docker exec -it wpthememapasculturais_wordpress_1 service cron start
```

WP Cron doesn't run properly when running the site as a Docker container, so we are using system cron to fetch statistics from Mapas Culturais installations.

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
