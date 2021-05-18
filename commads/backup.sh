#!/bin/bash
set -e
while true; do
    reset
    echo "----------------- BACKUP -----------------\n"
    echo "1 - Lliège Teste\n"
    echo "2 - Lliège Produção\n"
    echo "3 - Ibiúna Homologação\n"
    echo "4 - Ibiúna Produção\n"
    echo "99 - Voltar ao menu anterior\n"
    read -p "Escolha código do ambiente: -------> " escolha
    case $escolha in
        [1]* )
		    sh ~/commads/backup/lliege-teste.sh
		    break;;
        [2]* )
		    sh ~/commads/backup/lliege-producao.sh
		    break;;
        [3]* )
		    sh ~/commads/backup/ibiuna-homolog.sh
		    break;;
        [4]* )
		    sh ~/commads/backup/ibiuna-producao.sh
		    break;;
        [99]* )
		    sh ~/sw-commands.sh
		    break;;
        * ) echo "------- Escolha inválida! -------";;
    esac
done
