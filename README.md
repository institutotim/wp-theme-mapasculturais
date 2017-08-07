> **Portal do Mapas Culturais** is a website that gathers information about *Mapas Culturais* platform, providing institutional information about the project as well serving as plataform for development and support of the project. This repository holds the Wordpress theme used by the website.

## Install

* Copy this repository to `wp-content` directory of your Wordpress install;
* Activate this theme at the menu 'Apperance/Themes';
* Install suggested plugins (ACF and others) at the menu 'Plugins';
* Create the following pages:
  * Homepage, using model 'Homepage';
  * News;

## Development

Base dependencies:

* [Docker](https://www.docker.com/)
* [gettext](https://www.gnu.org/software/gettext/)


Clone locally and install modules

```
git clone <this repository git url>
cd wp-theme-mapasculturais
bower install
grunt build
# or just "grunt" to watch for changes
```

Add the following line to `wp-config.php`, changing `<your-key>` to [ACF PRO](https://www.advancedcustomfields.com/pro/) key:

    define("ACF_PRO_KEY", "<your-key>");

Start services:

```shell
  docker-compose up
```

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

## License

Mapas Culturais Wordpress Theme
Copyright (C) <2016> <Instituto TIM>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
