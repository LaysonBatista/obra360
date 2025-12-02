# Obra360

Sistema web para acompanhamento e transparência de obras, com acesso para clientes e equipes da construtora. Permite autenticação de dois perfis, visualização de obras, etapas, detalhes e atualizações.

## Tecnologias
- PHP (PDO)
- MySQL
- HTML/CSS/JavaScript
- Ambiente: XAMPP (Apache + MySQL) em Windows

## Requisitos
- XAMPP instalado com Apache e MySQL ativos
- PHP habilitado no Apache
- MySQL acessível (porta padrão usada: `3306`, ajustável)

## Instalação e Setup
1. Copie o projeto para `c:\xampp\htdocs\Obra360`.
2. Inicie Apache e MySQL pelo XAMPP.
3. Importe o banco:
   - Abra o phpMyAdmin.
   - Crie o banco `obra360` (se não existir).
   - Importe `src/database/db_obra360.sql`.
4. (Opcional) Ajuste credenciais/porta em `src/database/conexao.php`:
   - `dsn`: `mysql:dbname=obra360;host=127.0.0.1;port=3306`
   - `user`: `root`
   - `password`: `''` (vazio por padrão no XAMPP)

## Execução Local
- Acesse no navegador: `http://localhost/Obra360/src/public/views/tela_inicial.php`
- Páginas de login:
  - Construtora: `src/public/views/tela_login_construtora.php`
  - Cliente: `src/public/views/tela_login_cliente.php`
- Pós-login esperado:
  - Construtora: `src/public/views/tela_principal_construtora.php`
  - Cliente: `src/public/views/tela_principal_cliente.php`

## Estrutura do Projeto
- `src/public/views` — páginas PHP (telas de login, principais, cadastros, consultas, detalhes)
- `src/public/style` — estilos CSS
- `src/public/js` — scripts JS (ex.: `timeline.js`, `tela_mensagem.js`)
- `src/public/images` — imagens e ícones
- `src/database` — `conexao.php`, validações de login e `db_obra360.sql`
- `src/app` — camadas POO
  - `Domain` (`Usuario.php`, `Cliente.php`, `FuncionarioConstrutora.php`, `Obra.php`)
  - `Interfaces` (`Autenticavel.php`)
  - `Services` (`AuthService.php`)
  - `bootstrap.php` (autoloader básico e boot de dependências)

## Fluxos Principais
- Login de Construtora e Cliente
  - Validação via `src/database/validarLogin_construtora.php` e `src/database/validarLogin_cliente.php`
- Navegação pós-autenticação
  - Telas principais com acesso a obras, etapas, detalhes e atualizações

## Banco de Dados
- Banco: `obra360`
- DSN padrão: `mysql:dbname=obra360;host=127.0.0.1;port=3306`
- Tabelas principais:
  - `clientes`, `construtora`, `funcionarios`, `funcionarios_construtora`
  - `obras`, `etapas`, `detalhes_etapa`, `atualizacoes`
- Seeds: usuários e dados de exemplo inclusos em `src/database/db_obra360.sql`

## Testes e Verificação Manual
- Acesse a tela inicial e faça login com credenciais de seed.
- Verifique o redirecionamento para a tela principal adequada.
- Navegue até listagem de obras e etapas; valide exibição de detalhes.

## Problemas Comuns (Troubleshooting)
- Porta do MySQL diferente de `3306`:
  - Edite `src/database/conexao.php` e ajuste `port` no DSN.
- Credenciais do MySQL diferentes do padrão:
  - Atualize `user`/`password` em `conexao.php`.
- Erros de sessão/cookies:
  - Garanta Apache e PHP ativos; verifique configurações de `session_start()` nas páginas de login.

## Convenções e Contribuição
- Backend com PDO e organização POO em `src/app`.
- Mantenha estilo consistente e evite credenciais hardcoded.
- Sugestão de contribuição: pull requests com descrição, testes manuais e revisão.

## Roadmap / Próximos Passos
- Evoluir a camada POO (Services/Domain) e padronizar redirecionamentos pós-login.
- Introduzir variáveis de ambiente (`.env`) e remover configs hardcoded.
- Adicionar testes automatizados (ex.: `phpunit`).
