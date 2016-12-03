Yii 2 Advanced Project Template API
===========================================

Projeto com template advanced para depois ser integrado no portal
beta test only :)


- correr "composer update"
- correr "php init"
- definir DB em "common/config/main.php"



ESTRUTURA
-------------------

```
api
    config/
    controllers/
    models/
    runtime/
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
environments/            contains environment-based overrides
vendor/                  contains dependent 3rd-party packages
```
