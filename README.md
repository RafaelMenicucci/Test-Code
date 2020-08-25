# Test&Code

Test&Code é uma ferramenta para criação e correção de provas e trabalhos de códigos orientados a objetos, desenvolvida para professores e alunos de cursos relacionados a área da computação.

## Começando

Essas instruções fornecerão uma cópia do projeto em execução na sua máquina local ou servidor, ambos Linux, para fins de desenvolvimento, teste e utilização. 

### Pré-requisitos

1.PHP 7.4.1+

```
$ sudo apt install php7.4.1
```

2.Extensões PHP (PHP extensions) para utilização do Laravel

```
$ apt-get install openssl php7.4.1-curl php7.4.1-dev php7.4.1-gd php7.4.1-mbstring php7.4.1-zip php7.4.1-mysql php7.4.1-xml php-token-stream php7.4.1-json php7.4.1-bcmath php7.4.1-json php7.4.1-tokenizer
```
3.Banco de dados para utilização das tabelas

```
$ sudo apt install mariadb-server
```

4.Apache Maven

```
$ sudo apt-get install maven
```

5.Composer para instalação do Laravel

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

6.Laravel

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

Crie as tabelas com o comando do laravel.

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
