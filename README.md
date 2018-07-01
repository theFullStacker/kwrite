# kwrite



# Roteamento da aplicação.
As rotas na aplicação são realizadas a nivel servidor
Isso ajuda a garantir melhor organização do projeto e
das urls. No .htaccess e preciso manter a seguinte estrutura

RewriteEngine on
RewriteRule ^rota$ script.php [NC]
RewriteRule ^blog/system/create$ applications/autoloads/BlogSystemCreateEnglish.php
RewriteRule ^blog/system/create/english$ applications/autoloads/BlogSystemCreateEnglish.php
RewriteRule ^blog/system/create/portuguese$ applications/autoloads/BlogSystemCreatePortuguese.php