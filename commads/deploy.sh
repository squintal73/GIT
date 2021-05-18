#!/bin/bash
set -e
while true; do
    reset
    echo "----------------- DEPLOY -----------------\n"
    echo "1 - Local\n"
    echo "2 - Lliège Teste\n"
    echo "3 - Lliège Produção\n"
    echo "4 - Ibiúna Homologação\n"
    echo "5 - Guarujá Homologação\n"
    echo "99 - Voltar ao menu anterior\n"
    read -p "Escolha código do ambiente: -------> " escolha
    case $escolha in
        [1]* )
            sh ~/commads/deploy/local.sh
            break;;
        [2]* )
            sh ~/commads/deploy/lliege-teste.sh
            break;;
        [3]* )
            sh ~/commads/deploy/lliege-producao.sh
            break;;
        [4]* )
            sh ~/commads/deploy/ibiuna-homolog.sh
            break;;
        [5]* )
            sh ~/commads/deploy/guaruja-homolog.sh
            break;;
        [99]* )
		    sh ~/sw-commands.sh
		    break;;
        * ) echo "------- Escolha inválida! -------";;
    esac
done
