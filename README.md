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

## Setup development

Install:

* [Docker](https://www.docker.com/)

### Clone locally

```
git clone <this repository git url>
cd wp-theme-mapasculturais
```

### Start local server

```shell
  docker-compose up
```

### Configure

Walk through the 5-min install and enable this theme in "Apperance/Themes" at admin panel.
