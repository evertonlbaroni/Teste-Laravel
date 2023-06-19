## Instruções para Execução

Renomear arquivo `.env.example` para `.env`

Definir no arquivo `.env` as configurações para criação e acesso ao banco de dados.

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=abc123
```

Inicializar containers.

```
docker compose up -d

```

Instalar dependências.'

```
docker compose exec app composer install
docker compose exec node yarn

```

Criar tabelas no banco de dados.

```
docker compose exec app php artisan migrate

```

Gerar usuário inicial. 

```
docker compose exec app php artisan db:seed

//test@test.com
//abc123

```

Compilar assets.

```
docker compose exec node yarn prod
```

Acesso: http://localhost:8000
