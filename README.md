# LW Treinamentos
### LW Treinamentos - Aplicação Web Construido em Php com Framework Laravel


- Características:
  - De forma simples podemos cadastrar Pessoas; salas de Aula/Café, consultar salas com respectivos alunos, e alunos nas suas respectivas salas.

**Antes de iniciar precisamos seguir alguns passos rápidos.** 

1. Download do Php: [PHP](https://windows.php.net/download#php-7.4) -> Opção zip na versão 7.. Thread Safe
   - Extrair arquivo em uma pasta desejada.
   - copiar o arquivo "php.ini-development" e colar na mesma pasta, renomando com o nome "php.ini".
   - abrir arquivo php.ini com editor de texto, buscar por nomes (Ctrl + f): "extension=pdo_sqlite"(*proximo linha 935*  e "extension_dir"(*proximo linha 761*), apagar o ";" do início.

- Após Instalar Php, precisamos adicionar o Php nas variaveis de ambiente.
  - Menu Iniciar -> "adicionar as variaveis de ambiente do sistema" -> Variaveis de Ambiente -> Editar variavel Path -> Novo -> Colar o caminho da pasta onde o php foi extraido. 

2. Subindo Api via localhost:
   - Menu iniciar cmd, navegar até a pasta do projeto, exemplo: cd/desktop/lwtreinamentos
   - Após acessar a pasta digitar : php -S localhost:8000 -t public ou php artisan serve

-------------------------------------------------------------------------------------

3. Qual o fluxo da Aplicação?
   - Cadastrar 2 Salas de Aula;
   - Cadastrar 2 Salas para Café;
   - Cadastrar Alunos;
   - Separar Etapas (Ao terminar de cadastrar todos alunos, devera Separar Etapas).

4. Infraestrutura
   - Para facilitar utilizamos Sqlite para evitar download de aplicativos terceiros.
   - Caso queira trocar o banco, esta localizado na raiz o arquivo .env
   
5. Se localizando nas pastas do Projeto
   - Controllers : app -> http -> controllers
   - Model : app -> models -> model
   - Views : resources -> views
   - Rotas : routes -> web
   
> Caso você chegou até este ponto esta pronto para rodar a aplicação, caso queira zerar o banco, digitar na linha de comando: php artisan migrate:fresh. Muito Obrigado
 
