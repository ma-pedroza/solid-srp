# Projeto SRP em PHP — Exercícios 1 e 2

## Visão Geral

Este repositório contém **dois projetos desenvolvidos em PHP puro**, com o objetivo de **aplicar o Princípio da Responsabilidade Única (SRP)**, a **organização em camadas**, e as normas **PSR-4** e **PSR-12**.
Ambos os projetos foram estruturados de forma didática, com foco em boas práticas de arquitetura e separação clara de responsabilidades entre **domínio**, **aplicação**, **infraestrutura** e **apresentação**.

---

## Estrutura do Repositório

```
├─ projeto1    # Exercício 1 — Listagem de Usuários
├─ projeto-2   # Exercício 2 — Cadastro e Listagem de Produtos
└─ README.md                  # Este arquivo
```

---

## Exercício 1 — Listagem de Usuários (Projeto 1)

### Objetivo

Adicionar uma **listagem de usuários** (somente leitura) ao projeto base desenvolvido em sala, mantendo **SRP** e **separação de camadas**.

### Requisitos principais

* Ler os dados do arquivo `storage/users.txt`.
* Exibir uma **tabela HTML simples** com nome e e-mail.
* Nenhuma lógica de negócio na camada pública (somente renderização).
* Camadas separadas:

  * **Infraestrutura:** leitura do arquivo.
  * **Aplicação:** orquestração via serviço.
  * **Apresentação:** exibição na web.
* Seguir os padrões **PSR-4** e **PSR-12**.

### Exemplo de uso

Acesse:

```
   http://localhost/solid-srp/projeto1/public/
```

para visualizar a listagem dos usuários cadastrados.

---

## Exercício 2 — Cadastro e Listagem de Produtos (Projeto 2)

### Objetivo

Criar um **novo sistema do zero** para **cadastro e listagem de produtos**, aplicando SRP, PSR-4 e camadas bem definidas — **sem banco de dados**, apenas com persistência em arquivo texto (`products.txt`).

### Funcionalidades

* **Cadastro de produto:** valida nome e preço antes de salvar.
* **Listagem de produtos:** exibe tabela simples com `id`, `name` e `price`.
* **Validação:** nome ≥ 2 caracteres, preço ≥ 0.
* **Persistência:** arquivo `storage/products.txt`, formato JSON por linha.

### Estrutura resumida

```
products-srp-demo/
├─ src/
│  ├─ Contracts/        # Interfaces de repositório e validação
│  ├─ Application/      # Serviços de aplicação
│  ├─ Domain/           # Validação de regras
│  └─ Infra/            # Persistência em arquivo
├─ public/              # Páginas de cadastro e listagem
└─ storage/             # Arquivo de dados
```

### Casos de teste manuais

| Caso              | Entrada                      | Resultado Esperado                      |
| ----------------- | ---------------------------- | --------------------------------------- |
| Cadastro válido | name="Teclado", price=120.50 | Produto criado e listado                |
| Nome curto      | name="T"                     | Rejeitado                               |
| Preço negativo  | price=-10                    | Rejeitado                               |
| Lista vazia    | Sem produtos                 | Mensagem de “Nenhum produto cadastrado” |

Acesse:

```
   http://localhost/solid-srp/projeto2/public/
```

para cadastrar e listar produtos.

---

## Conceitos aplicados

* **SRP (Single Responsibility Principle)**
  Cada classe tem uma responsabilidade única e bem definida.

* **PSR-4 Autoloading**
  Estrutura de diretórios compatível com o autoloader do Composer.

* **PSR-12 Coding Style**
  Código padronizado conforme as boas práticas do PHP moderno.

* **Camadas separadas:**

  * **Domain:** Regras de negócio e validação.
  * **Application:** Orquestração de casos de uso.
  * **Infra:** Persistência e acesso a dados.
  * **Public:** Interface com o usuário.

---

## Discentes

| Nome | RA |
| ---- | -- |
|  Rayssa Gomides Marconato    | 2001130   |
|   Matheus Gomes   |  1998912  |

---

## Créditos

Projeto desenvolvido para fins acadêmicos, com o propósito de consolidar os conceitos de **SOLID** e **boas práticas em PHP** aplicadas em sistemas modulares e escaláveis.
