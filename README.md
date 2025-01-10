<div align="center">
  <img alt="First Decision" title="First Decision" src="https://static.wixstatic.com/media/54d165_d986d9ffd9c240d48be86b3c6143604b~mv2_d_5468_1474_s_2.png/v1/fill/w_296,h_80,al_c,q_95,enc_avif,quality_auto/Logo_Horizontal_Colorida.png" width="20%" />
</div>
<h1 align="center">
    Desafio FIST DECISION.
</h1>

<p align="center">
  <a href="https://www.firstdecision.com.br/">First Decision</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</p>


## Página de Cadastro (Laravel/Blade):

> - Crie uma página de registro de usuário com os seguintes campos:
> - Nome (obrigatório, mínimo de 3 caracteres, máximo de 50 caracteres).
> - E-mail (obrigatório, deve ser um e-mail válido).
> - Senha (obrigatória, mínimo de 6 caracteres, máximo de 20 caracteres).
> - Confirmação de Senha (obrigatória e deve coincidir com a senha).

## Validações (Laravel):
> - Utilize as ferramentas de validação fornecidas pelo Laravel para validar os
campos do formulário.
> - Exiba mensagens de erro apropriadas quando os campos não atenderem às
regras especificadas acima.

## Modelo e Migração (Laravel):
> - Crie um modelo e uma migração para armazenar os usuários no banco de dados
PostgreSQL.
> - Configure a tabela para armazenar as informações dos usuários.

## API de Back-end (Laravel):
> - Crie uma API RESTful em Laravel para processar o registro de usuários.
> - Valide os dados recebidos da solicitação, incluindo a confirmação de senha.
> - Armazene os usuários registrados no banco de dados PostgreSQL.
> - Retorne uma resposta apropriada para o front-end (por exemplo, sucesso ou
erro) no formato JSON.

## Testes Unitários (Laravel/PHP):
> - Escreva pelo menos um teste unitário para a API Laravel para garantir que os
dados sejam validados corretamente e armazenados no banco de dados
PostgreSQL.
> - Utilize a ferramenta de teste do Laravel para isso.

## 🔧 Configuração do ambiente

### DB
Banco de dados Postgresql em docker, pronto para ser utilizado no Desafio.

#### Iniciando docker:
- acesse a pasta DB e execute o comando abaixo:
`docker compose up`

### Api:

- API será usada no Desafio FIST DECISION para cadastrar usuario.
- Banco de dados Postgresql.

#### Iniciando:

1. Copie o arquivo `.env.example` para `.env` e modifique se necessário
2. `composer Install`
3. `php artisan key:generate`
4. `php artisan migrate`
5. Executar com o comando: <br/>`php artisan serve`

### Rotas já criadas:

1. / -  Cadastro de usuario pelo Blade
2. /api/ - Teste a API
3. /api/register - Grava o usuario
   **Exemplo de JSON utilizado na API**:  
   ```json
   {
       "name": "João Silva 3",
       "email": "joao.silva3@example.com",
       "password": "senha123",
       "password_confirmation": "senha123"
   }
4. /api/users - Lista os usuarios gravados

### Executando testes:

Acesse a pasta api:
Execute o comando 
`php artisan test --filter=RegisterServiceTest`


## Extras

- Exibir lista de usuarios: <br/>
- Estrutura de pastas e organização do código;
- Seguir os padrões do Laravel sempre que possível, especialmente na criação de: Rotas, Migrations, Models, Controllers;
- Seguir o padrão REST para as rotas da API;
- Manter o histórico dos commits e utilizar Conventional Commits Pattern.
- utilizar swagger para teste das rotas
# first_decision
