# Reportei Tech Challenge

## Escopo do Desafio

O desafio consiste em criar um sistema para dispor métricas dos repositórios de um usuário do GitHub.

Um login de usuário no Github seleciona um de seus repositórios. O aplicativo então coleta o número de commits dos últimos 90 dias, salva no banco de dados e depois plota em um gráfico. O gráfico possui o número de commits no eixo y e dias no eixo x.

## Implementação

Para implementar o desafio, foi utilizado o framework Laravel para a API e o Vuejs + Nuxt para o front-end.

O front-end foi hospedado no Vercel e o back-end em uma VM na Digital Ocean.

Acessar o [front-end](https://front.lucasvarino.tech/)
- Basta clicar em Get Started e fazer login com o Github.

Link para a [API](https://api.lucasvarino.tech/)

## Requisitos Implementados

- [x] O usuário deve ser capaz de se autenticar com o Github.
- [x] O usuário deve ser capaz de selecionar um de seus repositórios.
- [x] O aplicativo deve coletar o número de commits dos últimos 90 dias.
- [x] O aplicativo deve salvar os commits no banco de dados.
- [x] O aplicativo deve plotar os commits em um gráfico.
- [x] O aplicativo deve ser responsivo.
- [x] O aplicativo deve ser hospedado em um servidor.

## Requisitos Extras

- [x] Landing Page
- [x] Informações extras do repositório

## Instalação

As instruções para instalação estão individualmente em cada pasta do projeto.

## Autor

Lucas de Oliveira Varino - [Linkedin](https://www.linkedin.com/in/lucasvarino/)