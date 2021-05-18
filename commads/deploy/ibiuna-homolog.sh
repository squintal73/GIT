sshpass -p '#ll2020@' ssh -p 2259 -t -o StrictHostKeyChecking=no lliegeadmin@200.201.218.66 'sudo docker exec -ti php-fpm5.6 bash -c "cd /var/www/html/grp3 && git pull && php bin/console --no-interaction doc:mi:mi"'

