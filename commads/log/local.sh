#!bin/bash
reset

docker container exec postgres bash -c 'echo "" > /var/lib/postgresql/data/log/postgresql.log && tail -f /var/lib/postgresql/data/log/postgresql.log'
