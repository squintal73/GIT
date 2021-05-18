echo "<=== Início Deploy GRP ===>\n"

sudo docker exec -ti php-fpm5.6 bash -c "cd /var/www/html/grp3 && \
git pull && \
php bin/console --no-interaction doc:mi:mi"

echo "\n\n<=== Sucesso. Deploy Realizado! ===>\n"
exit
