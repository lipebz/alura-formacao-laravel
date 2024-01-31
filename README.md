A partir do WSL rode os comandos:

CLONE O REPOSITÓRIO

git clone https://github.com/lipebz/alura-laravel-criando-uma-aplicacao-com-MVC.git

ENTRE NA PASTA DO PRJETO

cd alura-laravel-criando-uma-aplicacao-com-MVC

COPIE O ARQUIVO .ENV

cp .env.example .env

BAIXE AS DEPENDENDÊNCIAS DO COMPOSER

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

CRIE UM ALIAS PARA O SAIL

alias sail='bash ./vendor/bin/sail'

INICIALIZE O SERVIDOR

sail up -d

chmod 777 ./ -R

sail artisan key:generate

sail artisan migrate

INICIALIZE O VITE

sail npm i
sail npm run dev


PARA FINALIZAR O SERVIDOR

sail down