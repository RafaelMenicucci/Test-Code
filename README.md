# Test&Code

Test&Code é uma ferramenta para criação e correção de provas e trabalhos de códigos orientados a objetos, desenvolvida para professores e alunos de cursos relacionados a área da computação.

## Começando

Essas instruções fornecerão uma cópia do projeto em execução na sua máquina local ou servidor, ambos GNU/Linux(Ubuntu), para fins de desenvolvimento, teste e utilização. 

### Pré-requisitos

1.Antes de começar deve se rodar o comando abaixo para atualizar os pacotes que vamos precisar

```
$ sudo apt-get update
```

2.PHP 7.4+

```
$ sudo apt-get install software-properties-common
$ sudo add-apt-repository ppa:ondrej/php
$ sudo apt install php7.4
```

3.Extensões PHP (PHP extensions) para utilização do Laravel

```
$ sudo apt-get install openssl php7.4-curl php7.4-dev php7.4-gd php7.4-mbstring php7.4-zip php7.4-mysql php7.4-xml php-token-stream php7.4-json php7.4-bcmath php7.4-json php7.4-tokenizer
```

4.Banco de dados recomendado para utilização das tabelas

```
$ sudo apt install mariadb-server
```

5.Apache Maven

```
$ sudo apt-get install maven
```

6.Composer para instalação do Laravel

```
cd ~
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo apt install composer
```

7.Laravel

```
$ composer global require "laravel/installer"
```

### Como instalar

```
$ git clone https://github.com/RafaelMenicucci/Test-Code.git
```
Não possuindo git na sua máquina faça o download manualmente por este github.


```
$ cd Test-Code
```

Após isto é necessário a configuração do arquivo .env.example para que fique compatível aos dados do seu banco de dados, e depois mudar o nome do arquivo para .env

```
$ mv .env.example .env
```

Após isso deve-se instalar as dependências do projeto que estão no arquivo composer.lock

```
$ composer install
```

Crie as tabelas na sua database com o comando do laravel.

```
$ php artisan migrate
```

Faça a seed do administrador também pelo Laravel. OBS: o email e senha podem ser definidos na classe UserADMSeeder que se localiza em database/seeds.

```
$ php artisan db:seed --class=UserADMSeeder
```
<img src="/public/seedadm.png">

Inicie o servidor

```
$ php artisan serve
```
<img src="/public/servidoriniciado.png">

Para testar se tudo funcionou corretamente abra o site e tente fazer o login como administrador, com o email e senha utilizados na seed.

## Implantação(Deployment)

Caso seja necessário o Deployment em um servidor pode se utilizar o comando:
```
$ php artisan serve & disown
```
Para que o servidor continue rodando após o fechamento do terminal.

## Informações Adicionais

Para mais informações acesse(baixe) a monografia:______________(a terminar)

## Autores

* **Rafael Alves Menicucci Pinto**
* **Pedro Seiti Mazine Kiyuna**
