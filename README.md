# Projeto: Dashboard de Clientes com PHP e Azure SQL

Este é um projeto acadêmico para demonstrar a conexão de uma aplicação web PHP com um banco de dados SQL Server hospedado na nuvem Microsoft Azure. A aplicação exibe uma lista de clientes extraídos do banco de dados em uma tabela HTML estilizada.

## Tecnologias Utilizadas
* **Backend:** PHP
* **Banco de Dados:** Microsoft Azure SQL Database
* **Servidor Web Local:** XAMPP (Apache)
* **Versionamento:** Git & GitHub

---

### 1. Como Configurar o Banco de Dados na Azure

Para configurar o ambiente de banco de dados necessário para a aplicação, siga estes passos:

1.  **Criação do Recurso:** No portal do Microsoft Azure, crie um novo recurso do tipo "Banco de Dados SQL".
2.  **Criação do Servidor:** Durante a configuração, crie um novo Servidor SQL, definindo um login de administrador e uma senha segura.
3.  **Configuração do Firewall:** No recurso do Servidor SQL, acesse a seção "Firewalls e redes virtuais" e adicione uma regra para permitir o acesso do seu endereço de IP local.
4.  **Execução do Script SQL:** Utilize o "Editor de Consultas" do portal para executar o script contido no arquivo `Banco de dados.sql`. Este script irá criar a tabela `Clientes` e inserir 30 registros de exemplo.

---

### 2. Como Executar a Aplicação PHP

1.  **Pré-requisitos:**
    * Ter o [XAMPP](https://www.apachefriends.org/) instalado e com o serviço Apache em execução.
    * Ter os [drivers Microsoft para PHP para SQL Server](https://learn.microsoft.com/pt-br/sql/connect/php/download-drivers-php-sql-server) instalados e ativados no arquivo `php.ini`.
    * Ter o [Git](https://git-scm.com/) instalado.

2.  **Clone o Repositório:**
    ```bash
    git clone [URL_DO_SEU_REPOSITORIO_AQUI]
    ```

3.  **Mova para o `htdocs`:**
    Mova a pasta do projeto clonado para o diretório `htdocs` da sua instalação do XAMPP (geralmente `C:\xampp\htdocs`).

4.  **Configure as Credenciais do Banco:**
    * Abra o arquivo `index.php`.
    * Localize o array `$connectionOptions` e substitua os valores pelas credenciais do seu banco de dados Azure.

    ```php
    $connectionOptions = array(
        "Database" => "seu-banco-de-dados",
        "Uid" => "seu-usuario-admin",
        "PWD" => "sua-senha-segura"
    );
    ```
    ⚠️ **Aviso de Segurança:** O código deste projeto armazena as credenciais diretamente no script para fins de simplicidade acadêmica. Em um ambiente de produção, utilize variáveis de ambiente ou um serviço de gerenciamento de segredos, como o Azure Key Vault.

5.  **Acesse a Aplicação:**
    Abra seu navegador e acesse a URL correspondente (ex: `http://localhost/nome-da-pasta-do-projeto/`).