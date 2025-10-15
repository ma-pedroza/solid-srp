# Projeto 2 - Cadastro e Listagem de Produtos (SRP Demo)

## Descrição

Este projeto foi desenvolvido em **PHP puro** com o objetivo de aplicar os princípios de **Single Responsibility Principle (SRP)**, **PSR-4** e **organização em camadas**.
O sistema realiza **cadastro** e **listagem de produtos**, utilizando apenas **arquivos texto (.txt)** como persistência de dados — sem banco de dados ou frameworks.

---

## Estrutura do Projeto

```
products-srp-demo/
├─ composer.json
├─ vendor/
├─ src/
│  ├─ Contracts/
│  │  ├─ ProductRepository.php
│  │  └─ ProductValidator.php
│  ├─ Application/
│  │  └─ ProductService.php
│  ├─ Domain/
│  │  └─ SimpleProductValidator.php
│  └─ Infra/
│     └─ FileProductRepository.php
├─ public/
│  ├─ index.php
│  ├─ create.php
│  └─ products.php
└─ storage/
   └─ products.txt
```

---

## Funcionalidades

### Cadastro de Produto

* Valida **nome** (não vazio, 2–100 caracteres).
* Valida **preço** (numérico e não negativo).
* Persiste no arquivo `storage/products.txt` em formato JSON por linha.
* ID incremental simples (inicia em 1).

### Listagem de Produtos

* Exibe uma tabela com **ID, nome e preço**.
* Lê diretamente do arquivo `products.txt`.
* Exibe mensagem “Nenhum produto cadastrado” quando o arquivo estiver vazio.

---

## Como Executar

1. Instale as dependências:

   ```bash
   composer dump-autoload
   ```

2. Inicie o servidor local (por exemplo, com o XAMPP):

   ```
   http://localhost/solid-srp/projeto2/public/
   ```

3. Use o formulário para cadastrar novos produtos e acesse:

   ```
   http://localhost/solid-srp/projeto2/public/products.php
   ```

   para visualizar a listagem.

---

## Casos de Teste Manuais

| Caso                   | Entrada                      | Resultado Esperado                            |
| ---------------------- | ---------------------------- | --------------------------------------------- |
| Cadastro válido      | name="Teclado", price=120.50 | Produto criado e aparece na listagem          |
| Nome curto           | name="T", price=50           | Rejeitado, mensagem de erro (nome < 2)        |
| Preço negativo       | name="Mouse", price=-10      | Rejeitado, mensagem de erro (preço negativo)  |
| Lista vazia         | Nenhum produto cadastrado    | Mensagem “Nenhum produto cadastrado”          |
| Múltiplos cadastros | 3 produtos válidos           | IDs incrementais corretos e listagem em ordem |

---

## Critérios de Aceite

* O projeto roda em: `http://localhost/products-srp-demo/public/`
* `ProductService` **não contém I/O direto** (sem `echo` ou leitura de arquivos).
* `FileProductRepository` é o **único responsável pela persistência**.
* `SimpleProductValidator` contém apenas a **lógica de validação**.
* Código segue **PSR-12** e boas práticas de separação de camadas.

---

## Discentes

| Nome | RA |
| ---- | -- |
|  Rayssa Gomides Marconato    | 2001130   |
|   Matheus Gomes   |  1998912  |
