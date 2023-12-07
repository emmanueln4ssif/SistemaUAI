## Usuário master:
- email: ```admin@uaihome.br```
- senha: ```12345678```

## Como executar o projeto

Para executar o projeto você deve seguir os seguintes passos:

- Copie o arquivo `.env.example` e renomeie sua cópia para `.env`
- Crie um banco 'MySql' com o nome de `sistema_uai`
- execute o comando: ```composer install```
- execute o comando: ```php artisan key:generate``` 
- execute o comando: ```npm install```
- execute o comando: ```npm run build```
- execute o comando: ```php artisan migrate``` para rodar o banco de dados.
