# Projeto 1 — Listagem de Usuários (SRP Demo)

## Descrição

Este projeto tem como objetivo **adicionar uma listagem de usuários** ao sistema desenvolvido em sala, aplicando o **Princípio da Responsabilidade Única (SRP)** e mantendo a **organização em camadas** conforme os padrões **PSR-4** e **PSR-12**.

A aplicação é desenvolvida em **PHP puro**, sem frameworks, utilizando **arquivos texto (.txt)** para persistência de dados.

---

## Objetivo Geral

Implementar uma **listagem de usuários (somente leitura)** que leia os dados de um arquivo e exiba as informações em uma tabela simples na web, mantendo cada responsabilidade isolada em sua camada.

---

## Estrutura do Projeto

```
solid-srp-demo/
├─ composer.json
├─ vendor/
├─ src/
│  ├─ Contracts/                # Interfaces e contratos
│  │  └─ UserRepository.php
│  ├─ Application/              # Camada de orquestração
│  │  └─ ListUsersService.php
│  ├─ Infra/                    # Camada de infraestrutura (I/O)
│  │  └─ FileUserRepository.php
├─ public/
│  ├─ index.php                 # Página inicial ou formulário
│  └─ users.php                 # Página pública de listagem
└─ storage/
   └─ users.txt                 # Arquivo com registros em JSON
```

---

## Funcionalidades

### Listagem de Usuários

* Leitura do arquivo `storage/users.txt`.
* Cada linha representa um usuário em formato JSON.
* Exibição em tabela HTML simples (Nome e E-mail).
* Mensagem “Nenhum usuário cadastrado” quando o arquivo estiver vazio.

---

## Conceitos Aplicados

* **SRP (Single Responsibility Principle):**
  Cada classe possui uma responsabilidade única:

  * `FileUserRepository`: leitura do arquivo.
  * `ListUsersService`: orquestração dos dados.
  * `users.php`: renderização da view.

* **PSR-4:**
  Estrutura de diretórios compatível com o autoload do Composer.

* **PSR-12:**
  Código padronizado conforme boas práticas do PHP moderno.

---

## Execução do Projeto

1. Instale as dependências:

   ```bash
   composer dump-autoload
   ```

2. Execute o servidor local (ex: XAMPP):

   ```
   http://localhost/solid-srp/projeto1/public/users.php
   ```

3. Adicione manualmente alguns usuários no arquivo `storage/users.txt`:

   ```json
   {"name": "Maria Silva", "email": "maria@email.com"}
   {"name": "João Pereira", "email": "joao@email.com"}
   ```

4. Atualize a página e veja a tabela renderizada com os usuários.

---

## Casos de Teste Manuais

| Caso                     | Entrada                   | Resultado Esperado                         |
| ------------------------ | ------------------------- | ------------------------------------------ |
| Listagem com registros | 2–3 usuários no arquivo   | Exibe tabela com nome e e-mail             |
| Lista vazia           | Arquivo `users.txt` vazio | Exibe mensagem “Nenhum usuário cadastrado” |

---

## Critérios de Aceite

* O projeto roda em: `http://localhost/solid-srp-demo/public/users.php`
* Nenhuma regra de negócio na camada pública.
* `FileUserRepository` é o único responsável por I/O.
* `ListUsersService` apenas orquestra as chamadas.
* Código segue **PSR-4**, **PSR-12** e **SRP**.

---

## Discentes

| Nome | RA |
| ---- | -- |
|  Rayssa Gomides Marconato    | 2001130   |
|   Matheus Gomes   |  1998912  |
