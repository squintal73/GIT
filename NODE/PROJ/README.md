# O que é esse projeto?

Esse é o projeto de uma API RESTful feita em Node + Express e que persiste spoilers.

# Instalação

Dentro desse projeto você não vai encontrar a diretório node_modules, responsável por armazenar todas as suas dependências. Geralmente um projeto Node é distribuído assim porque a diretório node_modules costuma ser muito grande. Para obtê-lo tal como ele é utilizado no curso utilize o seguinte comando: 

npm install

Dessa forma, o arquivo package.json será lido e as dependências do projeto serão instaladas conforme estão descritas na seção dependencies do mesmo.

# Endpoints utilizados no curso

GET /api/spoilers

GET /api/spoilers/1

GET /api/spoilers/?limite=10&pagina=1

GET /api/spoilers/?limite=1&pagina='1=1'

POST /api/spoilers

PUT /api/spoilers/1

DELETE /api/spoilers/1