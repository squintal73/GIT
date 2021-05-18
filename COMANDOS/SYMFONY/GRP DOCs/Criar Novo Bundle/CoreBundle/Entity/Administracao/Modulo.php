<?php

namespace Urbem\CoreBundle\Entity\Administracao;

/**
 * Modulo
 */
class Modulo
{

const MODULO_STORE = 99;
    
/**
* @return array
*/
public static function getListModulesAvailable()
{
	return [
	    [
		'title' => 'Loja',
		'name' => 'store',
		'route' => 'store',
		'icon'  => 'add_shopping_cart'
	    ],
	];
}

}


