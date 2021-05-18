#!/bin/bash
set -e
while true; do
    reset
    echo "----------------- LOG -----------------\n"
    echo "1 - Local\n"
    echo "2 - Lliège Teste\n"
    echo "3 - Lliège Produção\n"
    echo "4 - Lliège Urbem\n"
    echo "5 - Ibiúna Homologação\n"
    echo "6 - Guarujá Homologação\n"
    echo "99 - Voltar ao menu anterior\n"
    read -p "Escolha código do ambiente: -------> " escolha
    case $escolha in
        [1]* )
            sh ~/commads/log/local.sh
            break;;
        [2]* )
            sh ~/commads/log/lliege-teste.sh
            break;;
        [3]* )
            sh ~/commads/log/lliege-producao.sh
            break;;
        [4]* )
            sh ~/commads/log/lliege-urbem.sh
            break;;
        [5]* )
            sh ~/commads/log/ibiuna-homolog.sh
            break;;
        [6]* )
            sh ~/commads/log/guaruja-homolog.sh
            break;;
        [99]* )
		    sh ~/sw-commands.sh
		    break;;
        * ) echo "------- Escolha inválida! -------";;
    esac
done
