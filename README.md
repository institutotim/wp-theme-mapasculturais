# Portal do Mapas Culturais

> O Portal do Mapas Culturais (PMC) é um website baseado no Wordpress que reúne informações sobre a comunidade da Plataforma Mapas Culturais, englobando informações institucionais e sobre desenvolvimento, discussões sobre funcionalidades e material de suporte ao usuário.

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
