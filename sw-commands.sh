#!/bin/bash
set -e
while true; do
    reset
    echo "----------------- SWITCH COMMANDS -----------------\n"
    echo "1 - Log\n"
    echo "2 - Acesso ao Servidor\n"
    echo "3 - Deploy\n"
    echo "4 - Backup\n"
    read -p "Escolha o commando: -------> " escolha
    case $escolha in
        [1]* )
            sh ~/commads/log.sh
            break;;
        [2]* )
            sh ~/commads/access-server.sh
            break;;
        [3]* )
            sh ~/commads/deploy.sh            
            break;;
        [4]* )
            sh ~/commads/backup.sh
            break;;
        * ) echo "------- Escolha inválida! -------";;
    esac
done
