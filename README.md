> **Portal do Mapas Culturais** is a website that gathers information about *Mapas Culturais* platform, providing institutional information about the project as well serving as plataform for development and support of the project. This repository holds the Wordpress theme used by the website.

## Documentation

* [Manual (PT)](docs/MANUAL.md): install and usage instructions;

## Development

Base dependencies:

* [Docker](https://www.docker.com/)
* [gettext](https://www.gnu.org/software/gettext/)
* [Yarn](https://yarnpkg.com/lang/en/docs/install/)

Clone locally and install modules

```
git clone <this repository git url>
cd wp-theme-mapasculturais
yarn
bower install
grunt build
# or just "grunt" to watch for changes
```

Start services:

```shell
  docker-compose up
```

Visit http://localhost:8080 to configure your Wordpress install.
 
Activate "Portal do Mapas Culturais" theme at http://localhost:8080/wp-admin/themes.php.

Install "Advanced Custom Fields" at the [plugins page](http://localhost:8080/wp-admin/plugin-install.php?s=acf+pro&tab=search&type=term).

Add the following line to `<repository_root>/.data/wp/wp-config.php`, changing `<your-key>` to [ACF PRO](https://www.advancedcustomfields.com/pro/) key:

    define("ACF_PRO_KEY", "<your-key>");

### Populating statistics

This step is needed only when running the server with Docker. To use system cron instead of WP Cron, add [cron.conf](cron.conf) to your crontab.


This cron task will add to every user with role "maintainer" and defined "instance_url" the following meta properties, which contain time series of elements count: `events_count`, `spaces_count`, `projects_count` and `agents_count`.

Run the following command to update statistics manually:

```
  docker exec -it wpthememapasculturais_wordpress_1 /usr/local/bin/php /var/www/html/wp-cron.php
```

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

### Translations

Run `grunt pot` to update the `languages/pmc.pot` and then translate the strings with Poedit.

## Changelog

No releases yet.

## License

[AGPL-3.0+](LICENSE)

Copyright (C) 2017 Instituto TIM
