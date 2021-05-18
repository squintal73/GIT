#!/bin/bash
set -e
while true; do
    reset
    echo "----------------- ACESSO AOS AMBIENTES -----------------\n"
    echo "1 - Lliège Teste\n"
    echo "2 - Lliège Produção\n"
    echo "3 - Lliège Urbem\n"
    echo "4 - Ibiúna Homologação\n"
    echo "5 - Ibiúna Produção\n"
    echo "6 - Guarujá Homologação\n"
    echo "99 - Voltar ao menu anterior\n"
    read -p "Escolha código do ambiente: -------> " escolha
    case $escolha in
        [1]* )
            sh ~/commads/access-server/lliege-teste.sh
            break;;
        [2]* )
            sh ~/commads/access-server/lliege-producao.sh
            break;;
        [3]* )
            sh ~/commads/access-server/lliege-urbem.sh
            break;;
        [4]* )
		    sh ~/commads/access-server/ibiuna-homolog.sh
        	break;;
        [5]* )
		    sh ~/commads/access-server/ibiuna-producao.sh
        	break;;
        [6]* )
            sh ~/commads/access-server/guaruja-homolog.sh
            break;;
	    [99]* )
            sh ~/sw-commands.sh
            break;;
        * ) echo "------- Escolha inválida! -------";;
    esac
done
