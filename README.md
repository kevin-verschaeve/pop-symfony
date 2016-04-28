# pop-symfony

## Slides
https://slides.com/keversc/symfony-et-bananas

## Installer le projet
Si vous n'avez pas composer: [installer composer](https://getcomposer.org/download/)

`git clone git@github.com:kevin-verschaeve/pop-symfony.git`

`composer install`

```
# mettre les bonnes valeurs dans parameters.yml (elles vous seront demandées pendant le composer install)
database_host: 127.0.0.1
database_port: null
database_name: pop
database_user: <your_user>
database_password: <your_password>
...
```

`php bin/console server:run`

Aller sur [localhost:8000](http://localhost:8000)
