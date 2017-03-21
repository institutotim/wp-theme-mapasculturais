> **Portal do Mapas Culturais** is a website that gathers information about *Mapas Culturais* platform, providing institutional information about the project as well serving as plataform for development and support of the project.

## Project Status

Currently we are developing the portal's wireframe.

## Running wireframe server locally

```shell

  # Clone repository
  git clone <link para este repositório>
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
