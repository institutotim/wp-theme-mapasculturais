> **Portal do Mapas Culturais** is a website that gathers information about *Mapas Culturais* platform, providing institutional information about the project as well serving as plataform for development and support of the project.

## Project Status

Currently we are developing the portal's wireframe.

## Run wireframe server

```shell

  # Clone this repository
  git clone <this repository git url>
  cd wp-theme-mapasculturais

  # Install dependencies
  sudo npm install -g pug-cli

  # Generate HTML
  cd wireframe/
  pug *.pug --out html/

  # Run server  
  python -m SimpleHTTPServer
```

Visit the wireframe at http://localhost:8000/html.

## Development setup

Install dependencies:

* [Docker](https://www.docker.com/)
* [gettext](https://www.gnu.org/software/gettext/)
    * Linux: `apt-get install gettext`
    * OSX: `brew install gettext`


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

### Configure

Walk through the 5-min install and enable this theme in "Apperance/Themes" at admin panel.
