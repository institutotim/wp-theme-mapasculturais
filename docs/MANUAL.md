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

### Páginas estáticas

As seguintes páginas deverão ser criadas no meu "Páginas/Adicionar nova", nesta ordem:

* Suporte:
  * modelo: "Support"
* 
* "Página inicial":
  * modelo: "Home page"


Crie uma nova página (menu Páginas/Adicionar nova) e escolha o modelo "Home page" para ela. Edite os campos "Introcution Text" e "Project description" para incluir o respectivo conteúdo na página.


### Formulário de newsletter

Com o plugin Mailchimp instalado, acesse o menu "Mailchimp for WP/Mailchimp" e siga as instruções na interface para inserir sua chave de API. 

Depois crie um novo formulário via menu "Mailchimp for WP/Formulário" com o seguinte código fonte, substituindo `MAILING_LIST_ID` pelo id da lista alvo do Mailchimp:

```
<div class="newsletter-form">

  <h2>
    <span class="fa fa-envelope"></span>
    Newsletter
  </h2>
  <input type="email" name="EMAIL" placeholder="Preencha seu email" required />
  <input name="_mc4wp_lists[]" value="<MAILING_LIST_ID>" type="hidden"> 
  <input type="submit" value="Cadastrar" />
</div>
```

**Continua...**

### Menus

Crie uma estrutura de menus para o cabeçalho e rodapé na opção "Aparência/Menus". Este é um exemplo de estrutura final do menu.

**Imagem do menu pronto...**

### Funções de usuários (*roles*)

- Instância: representa uma instalação do Mapas Culturais a ser monitorada e referênciada neste portal;
- Assinante:
- Colaborador:
- Autor:
- Editor: 
- Administrador: acesso total 

### Cadastro de instalações

As instâncias devem incluídas como usuários da plataforma, com função "Instância". Após o cadastro, preencha os campos de "Detalhes da Instância". Para que sejam recolhidas estatísticas da plataforma é necesssário que o campo "URL da Instância" aponte corretamente ao endpoint da API de uma instalação do Mapas Culturais. No caso do SP Cultura, por exemplo, o valor deve ser `http://spcultura.prefeitura.sp.gov.br`.

**A completar seção..**