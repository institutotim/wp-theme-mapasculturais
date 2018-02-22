# Manual do Tema Portal Mapas Culturais

(Em construção)

## Instalação

Passos para habilitar o tema Portal Mapas Culturais em um servidor com Wordpress.

### Ativação do tema e plugins

* Baixe a última versão do tema;
* Descompacte o arquivo na pasta `wp-content/themes` da sua instalação Wordpress;
* Adicione o chave de API do plugin Advanced Custom Fiels no arquivo `wp-config.php`:  
```
...
define('WP_DEBUG', false);
define('ACF_PRO_KEY', '<YOUR_ACF_API_KEY>');
...
```
* Logue como um admin no painel de controle do Wordpress (`/wp-admin`);
* Haverá um aviso sugerindo os plugins ACF e Mailchimp, confirme a instalação.

### Formulário de newsletter

Com o plugin Mailchimp instalado, acesse o menu "Mailchimp for WP/Mailchimp" e siga as instruções na interface para inserir sua chave de API. 

Depois crie um novo formulário via menu "Mailchimp for WP/Formulário" com o seguinte código fonte:

```
<div class="newsletter-form">
  <h2>
    <span class="fa fa-envelope"></span>
    Newsletter
  </h2>
  <input type="email" name="EMAIL" placeholder="Preencha seu email" required />
  <input type="submit" value="Cadastrar" />
</div>
```

**Continua...**

### Menus

Crie uma estrutura de menus para o cabeçalho e rodapé na opção "Aparência/Menus". Este é um exemplo de estrutura final do menu.

**Imagem do menu pronto...**

### Página inicial

Crie uma nova página (menu Páginas/Adicionar nova) e escolha o modelo "Home page" para ela. Edite os campos "Introcution Text" e "Project description" para incluir o respectivo conteúdo na página.

### Funções de usuários (*roles*)

- Instância: representa uma instalação do Mapas Culturais a ser monitorada e referênciada neste portal;
- Assinante:
- Colaborador:
- Autor:
- Editor: 
- Administrador: acesso total 

**A completar seção..**