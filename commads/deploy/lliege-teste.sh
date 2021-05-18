sshpass -p lliege@123 ssh -t -o StrictHostKeyChecking=no root@192.168.1.15 'docker exec -ti php-fpm5.6 bash -c "cd /var/www/html/grp3 && git pull && php bin/console --no-interaction doc:mi:mi"'

