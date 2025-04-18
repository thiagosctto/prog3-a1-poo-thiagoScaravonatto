**Nome:** Thiago José de Oliveira Scaravonatto   
**Turma:** Ciências da Computação - SMO  

## Descrição do Projeto

Sistema de autenticação de usuários desenvolvido em PHP puro com orientação a objetos, que permite:
- Cadastro de novos usuários
- Login com validação de credenciais
- Dashboard protegido por sessão
- Funcionalidade "Lembrar e-mail" com cookies
- Logout seguro

## Tecnologias Utilizadas

- PHP 7.4+
- XAMPP (Apache, MySQL)
- Programação Orientada a Objetos

## Como Executar Localmente

1. Certifique-se de ter o XAMPP instalado
2. Clone este repositório para a pasta `htdocs` do XAMPP
3. Inicie os serviços Apache e MySQL pelo painel do XAMPP
4. Acesse no navegador: `http://localhost/index.php/`

## Estrutura do Projeto
├── classes/ # Classes PHP do sistema <br/>
├── index.php # Redireciona para login <br/>
├── cadastro.php # Página de cadastro <br/>
├── login.php # Página de login <br/>
├── dashboard.php # Área restrita <br/>
├── logout.php # Encerra a sessão <br/>
└── README.md # Documentação <br/>

## Funcionalidades Implementadas

└──Cadastro de usuários com validação <br/>
└──Login com verificação de credenciais <br/>
└──Dashboard protegido por sessão <br/>
└──Funcionalidade "Lembrar e-mail" com cookies <br/>
└──Logout seguro <br/>
└──Uso de password_hash() e password_verify() <br/>
└──Proteção de rotas por sessão <br/>
└──Mensagens de feedback para o usuário <br/>
└──Organização em classes (Usuario, Sessao, Autenticador) <br/>

![image](https://github.com/user-attachments/assets/807da4de-f653-4b3c-85d4-a67bef74b236)

![image](https://github.com/user-attachments/assets/d69c507c-520c-45f9-b3a3-a5fa2dd376f5)
