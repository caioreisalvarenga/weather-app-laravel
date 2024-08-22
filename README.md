<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto

Esse projeto foi construído usando Laravel, Bootstrap, e JS para fazermos algumas validações e para fazermos a integração do Front com o Back, onde que consiste em uma aplicação de previsão do tempo, onde foi separada em branchs para fazer o controle de versionamento de código, usando a camada service para ter mais uma camada de segurança na aplicação, consumindo a API pública do Open Weather, ele faz a busca na API e salva no banco de dados logo em seguida, usando o método updateOrCreate, ele previne que seja salva a consulta 2 vezes no banco da dados, mas, ao mesmo tempo permite a consulta do mesmo, para executar o projeto:

- Clone o projeto.
- Configure o seu env para o banco de dados que você está usando aí(no meu caso eu usei o PostgreSQL).
- Rode composer install para instalar as dependências do Laravel.
- Rode php artisan migrate para atualizar as tabelas no teu banco de dados.
- Entre na API Open Weather para pegar uma chave da API Publica(no projeto a variável de ambiente no env da API é OPENWEATHER_API_KEY).
- Rode o comando php artisan serve pra ver o projeto funcionando(VUALÁ).
- Seja feliz e faça quantas buscas você quiser.

## Observação

Muito obrigado pela oportunidade de participar desse processo seletivo e de fazer esse teste, espero que em breve possamos estar resolvendo muitos desafios juntos, novamente, desde já, agradeço, aguardo um feedback.
