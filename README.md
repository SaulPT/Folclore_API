******************************************************
*Descontinuado (integrado noutro repositorio privado)*
******************************************************


Yii 2 Advanced Project Template API
===========================================

Projeto com template advanced para depois ser integrado no portal<br>
beta test only :)


- correr "composer update"
- definir DB em "common/config/main-local.php"



ESTRUTURA
-------------------

```
api
    config/
    controllers/
    models/
    runtime/
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
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
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
environments/            contains environment-based overrides
vendor/                  contains dependent 3rd-party packages
```
