sshpass -p lliege@123 ssh -t -o StrictHostKeyChecking=no root@192.168.1.15 "reset && sudo docker container exec postgres bash -c 'echo \"\" > /var/lib/postgresql/data/log/postgresql.log && tail -f /var/lib/postgresql/data/log/postgresql.log'"
