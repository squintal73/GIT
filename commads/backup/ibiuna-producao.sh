#!/bin/bash
set -e

while true; do
    read -p "---------> Deseja RESTAURAR o banco de dados GRP3? (s ou n) ------->" sn
    case $sn in
        [Ss]* )
		read -p "Novo Backup? (S)im " newBackup

		if [ $newBackup = "S" ] || [ $newBackup = "s" ] 
		then
			echo "------- Criando o arquivo de backup -------"
			
			PGPASSWORD="postgres" sshpass -p 'qSD!rE52BU' pg_dump -h 200.201.223.229 -U postgres --port=25432 grp3 > /var/www/html/backups/grp3_ibiuna_producao.sql
		fi

		echo "------- Restauração em execução -------"

		PGPASSWORD="postgres" psql -v ON_ERROR_STOP=1 -h localhost -U postgres --port=25432 --<<-EOSQL

		     SELECT 
			pg_terminate_backend(pid) 
		     FROM 
		    	pg_stat_activity 
		     WHERE pid <> pg_backend_pid() 
		     AND datname = 'grp3_ibiuna_producao';

		    DROP DATABASE IF EXISTS grp3_ibiuna_producao;
		    CREATE DATABASE grp3_ibiuna_producao;

		    \c grp3_ibiuna_producao
		    \i /var/www/html/backups/grp3_ibiuna_producao.sql
		EOSQL

        echo "------- Restauração em concluída -------"

		break;;

        [Nn]* )

		echo "------- Cancelada a restauração GRP3 -------"

		break;;

        * ) echo "------- Respostas aceitas: S(Sim) ou N(Não) -------";;
    esac
done