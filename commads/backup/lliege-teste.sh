#!/bin/bash
set -e

while true; do
    read -p "---------> Deseja RESTAURAR o banco de dados GRP3? (s ou n) ------->" sn
    case $sn in
        [Ss]* )
		echo "Novo Backup? (S)im " 

		read newBackup

		if [ $newBackup = "S" ] || [ $newBackup = "s" ] 
		then
			echo "------- Criando o arquivo de backup -------"
				    
			PGPASSWORD="postgres" sshpass -p lliege@2020#! pg_dump -h 192.168.1.15 -U postgres --port=25432 grp3 > /var/www/html/backups/grp3_lliege_teste.sql
		fi

		echo "------- Restauração em execução -------"

		PGPASSWORD="postgres" psql -v ON_ERROR_STOP=1 -h localhost -U postgres --port=25432 --<<-EOSQL

		     SELECT 
			pg_terminate_backend(pid) 
		     FROM 
		    	pg_stat_activity 
		     WHERE pid <> pg_backend_pid() 
		     AND datname = 'grp3_lliege_teste';

		    DROP DATABASE IF EXISTS grp3_lliege_teste;
		    CREATE DATABASE grp3_lliege_teste;

		    \c grp3_lliege_teste
		    \i /var/www/html/backups/grp3_lliege_teste.sql
		EOSQL

        	echo "------- Restauração em concluída -------"

		break;;

        [Nn]* )

		echo "------- Cancelada a restauração GRP3 -------"
		break;;

        * ) echo "------- Respostas aceitas: S(Sim) ou N(Não) -------";;
    esac
done
