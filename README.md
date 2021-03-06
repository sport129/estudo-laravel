<p align="center">
  <a href="https://laravel.com/">
    <img src="https://logos-download.com/wp-content/uploads/2016/09/Laravel_logo_wordmark_logotype.png" alt="Logo Laravel">
  </a>

  <h3 align="center">Laravel 5.6</h3>

  <p align="center">
    Love beautiful code? We do too.
    <br>
    <a href="https://laravel.com/docs/5.6"><strong>Explore a Documentação do Laravel »</strong></a>
    <br>
    <br>
  </p>
</p>

## Instalação Laravel - XAMPP (Windows)
- [Instalação XAMPP](#instalação-xampp)

## Instalação

- [Requerimentos](#requerimentos)
- [Instalando o Laravel](#instalando-o-laravel)
- [Configurações](#configurações)

## Configuração do Web Server
- [Pretty URLs](#pretyy-urls)

`O Aracasts fornece uma introdução completa ao Laravel,` [para os recém chegados ao framework](https://laracasts.com/series/laravel-from-scratch-2017). `É um ótimo lugar para começar sua jornada`

<p><h1>Instalação</h1></p>

## Requerimentos

A estrutura do Laravel possui alguns requisitos de sistema. É claro que todos esses requisitos são atendidos pela máquina virtual [Laravel Homestead](https://laravel.com/docs/5.6/homestead), portanto, é altamente recomendado que você use Homestead como seu ambiente de desenvolvimento local do Laravel. No entanto, se você não estiver usando o Homestead, será necessário garantir que seu servidor atenda aos seguintes requisitos.

- PHP >= 7.1.3 
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

## Instalando o Laravel

Laravel Utiliza o Composer para gerenciar suas dependências. Então, antes de usar o Laravel, certifique-se de ter o Composer Instalado em sua Máquina.

O Composer é uma ferramenta para gerenciamento de dependências em PHP. O Laravel utiliza o Composer para gerenciar suas dependência em PHP. O laravel utiliza o Composer para gerenciar suas dependências, ou seja, para instalar o Laravel, teremos que instalar o Composer.

[`https://getcomposer.org/download/`](https://getcomposer.org/download/)

Após instalar o Composer, basta abrir o Prompt de Comando do Windows e executar o comando:

`composer`

<p><h3>Via Laravel Installer</h3></p>

Primeiro, baixe o instalador do Laravel usando o Composer:

`composer global require "laravel/installer"`

Certifique-se de colocar o diretório bin do forncedor do sistema em seu $PATH para que o executável do laravel possa ser Localizado pelo seu sistema. Este diretório existe em diferentes localizações com base no seu sistema operacional; no entanto, alguns locais comuns incluem:

- macOS: `$HOME/.composer/vendor/bin`
- GNU / Linux Distributions: `$HOME/.config/composer/vendor/bin`

Uma vez instalado, o novo comando laravel criará uma nova instalação do Laravel no diretório que vocë especificar. Por Exemplo, o novo blog laravel criará um diretório chamado blog contendo uma nova instalação do Laravel com todas as dependências do Laravel já instaladas:

`laravel new blog`

<p><h3>Via Composer Create-Project</h3></p>

Como Alternativa, você também pode instalar o Laravel emitindo o comando Composer create-project no seu terminal:

`composer create-project --prefer-dist laravel/laravel blog`

<p><h3>Local Development Server</h3></p>


Se você tem o PHP instalado localmente e gostaria de usar o servidor de desenvolvimento interno do PHP para servir seu aplicativo, você pode usar o comando Artisan do serviço. Este comando irá iniciar um servidor de desenvolvimento em http://localhost:8000:

`php artisan serve`

Naturalmente, opções de desenvolvimento local mais robustas estão disponíveis via Homestead e Valet.

## Configurações

<p><h3>Diretório Público</h3></p>
Depois de instalar o Laravel, você deve configurar o documento / raiz da Web do servidor da Web para ser o diretório `public`. O `index.php` neste diretório serve como o front controller para todas as requisições HTTP que entram no seu aplicativo.

<p><h3>Configuração dos Arquivos</h3></p>
Todos os arquivos de configuração do framework Laravel são armazenados no diretório `config`. Cada opção é documentada, portanto sinta-se à vontade para examinar os arquivos e se familiarizar com as opções disponíveis para você.

<p><h3>Permissões dos Diretórios</h3></p>
Depois de instalar o Laravel, você pode precisar configurar algumas permissões. Os diretórios dentro dos diretórios `storge` e de `bootstrap/cache` devem ser graváveis ​​pelo seu servidor da Web ou o Laravel não será executado. Se você estiver usando a máquina virtual Homestead, essas permissões já devem estar definidas.

<p><h3>Chave da Aplicação</h3></p>

A próxima coisa que você deve fazer depois de instalar o Laravel é definir sua chave de aplicação para uma string aleatória. Se você instalou o Laravel através do Composer ou do instalador do Laravel, esta chave já foi configurada para você pela chave `php artisan: generate` command.

Normalmente, essa sequência deve ter 32 caracteres. A chave pode ser definida no arquivo de ambiente `.env`. Se você não tiver renomeado o arquivo `.env.example` para `.env`, deverá fazer isso agora. Se a chave do aplicativo não estiver definida, suas sessões de usuário e outros dados criptografados não serão seguros!

<p><h3>Configuração Adicionais</h3></p>
O Laravel não precisa de quase nenhuma outra configuração fora da caixa. Você está livre para começar a desenvolver! Entretanto, você pode querer revisar o arquivo `config/app.php` e sua documentação. Ele contém várias opções, como `timezone` e `locale`, que você pode querer alterar de acordo com o seu aplicativo.


Você também pode querer configurar alguns componentes adicionais do Laravel, como:

- [Cache](https://laravel.com/docs/5.6/cache#configuration)
- [Database](https://laravel.com/docs/5.6/database#configuration)
- [Session](https://laravel.com/docs/5.6/session#configuration)

<p><h1>Web Server Configuration</h1></p>

## Pretty URLs

<p><h3>Apache</h3></p>
O Laravel inclui um arquivo `public/.htaccess` que é usado para fornecer URLs sem o controlador frontal `index.php` no caminho. Antes de servir o Laravel com o Apache, certifique-se de ativar o módulo `mod_rewrite` para que o arquivo `.htaccess` seja respeitado pelo servidor.

Se o arquivo `.htaccess` fornecido com o Laravel não funcionar com a instalação do Apache, tente esta alternativa:

```php
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]   
```

<p><h3>Nginx</h3></p>
Se você estiver usando o Nginx, a seguinte diretiva na configuração do seu site direcionará todas as solicitações para o front controller index.php:

```php
location / {
    try_files $uri $uri/ /index.php?$query_string;
}  
```

claro, ao usar Homestead ou Valet, URLs bonitas serão configuradas automaticamente.

## Instalação XAMPP
<p align="center">
  <a href="https://www.apachefriends.org/pt_br/index.html" aligh="center">
    <img src="https://cdn.worldvectorlogo.com/logos/xampp.svg" alt="Logo Laravel" width="100" height="100">
  </a>

  <h3 align="center">XAMPP</h3>

  <p align="center">
    <a href="https://www.apachefriends.org/pt_br/download.html"><strong>Página de Download XAMPP »</strong></a>
    <br>
    <br>
  </p>
</p>

Os requerimentos para instalar o laravel, são os mesmo do [Requerimentos](#requerimentos)

<p><h3>XAMPP</h3></p>
Você precisa que seu computador seja capaz de atender aos requisitos mínimos necessários para instalar o Laravel. A maneira mais fácil é através no XAMPP. Basta Efetuar o download através do link, e seguir normalmente com a instalação.

[`https://www.apachefriends.org/pt_br/download.html`](https://www.apachefriends.org/pt_br/download.html)

<p><h3>Composer</h3></p>
O Composer é uma ferramenta para gerenciamento de dependências em PHP. O Laravel utiliza o Composer para gerenciar suas dependência em PHP. O laravel utiliza o Composer para gerenciar suas dependências, ou seja, para instalar o Laravel, teremos que instalar o Composer.

[`https://getcomposer.org/download/`](https://getcomposer.org/download/)

Após instalar o Composer, basta abrir o Prompt de Comando do Windows e executar o comando:

`composer`

<p><h3>Instalando o Laravel</h3></p>
Primeiramente devemos navegar até o diretório `htdocs` do xampp pelo prompt:

`cd\`

Utilizamos o comando cd\ para voltar ao diretório raiz, E sem seguida utilizamos o comando abaixo para acessar o diretório `htdocs` do xampp:

`cd\xampp\htdocs`

Após acessar o diretório `htdocs`, vamos instalar o Laravel utilizando o seguinte comando:

`composer create-project --prefer-dist laravel/laravel nome_do_seu_projeto`

<p><h3>Alterando as permissões</h3></p>
O último passo é alterar as permissões dos diretórios `bootstrap/cache` e `storage`. Você pode alterar as permissões dos diretórios da maneira que achar mais conveniente.

<p><h1>Como Acessar</h1></p>

Há duas maneiras de acessar o projeto Laravel criado

<p><h3>Acesso Manual</h3></p>
Para acessar seu projeto, utilize o prompt de comando para navegar até o diretório aonde foi feita sua instalação por exemplo: `cd\xampp\htdocs\nome_do_seu_projeto`, e execute o comando:

`php artisan serve`

Pronto! Agora utilize seu navegador para acessar o endereço: localhost:8000

<p><h3>Acesso pelo Xampp</h3></p>
Abra o paiel de Controle do xampp e aperte start nos dois serviços, Apache e Mysql, feito isso abra seu navegador e digite:

`localhost:porta_do_xampp(fornecida_pelo_programa)/nome_do_seu_projeto/public`