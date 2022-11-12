## Projeto Eleição


### Banco de Dados

- O banco de dados utilizado foi o MySQL, e para a criação do banco de dados foi utilizado as proprias migrations do laravel
- O script do banco vai se encontrar na pasta **scripts** no projeto
- Para executar o banco eu usei o docker, e para isso foi criado um arquivo **docker-compose.yml** na raiz do projeto
- Para executar o banco basta executar o comando **docker-compose up -d** na raiz do projeto

```bash
# Caso tenha o make instalado na maquina
$ make up
# ou
$ docker-compose up -d
```

### Configure a environment

- O banco está configurado para o MYSQL, caso queira utilizar outro banco, altere o arquivo `.env` ou `config/database.yml` com as configurações do seu banco de dados.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=password
```

### Como executar o projeto

1. Clone este repositório
2. Instale o laravel na sua máquina
3. Acesse a pasta do projeto no terminal/cmd
4. Execute o comando `composer install` para instalar as dependências
5. Execute o comando `npm install` para instalar as dependências
6. Execute o comando `php artisan migrate` para criar as tabelas no banco de dados
7. Execute o comando `php artisan serve` para iniciar o servidor da aplicação
8. Execute o comando `npm run dev` para iniciar o servidor do vite para complicar os styles
9. Acesse o endereço `http://localhost:8000` no seu navegador

### Como criar o banco

1. Execute o comando `php artisan migrate` para criar as tabelas no banco de dados
