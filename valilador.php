<?php

for ($i=1; $i < $argc; $i++) {parse_str($argv[$i]);}

/**
 * Ao tentar validar um arquivo XML, se algum erro
 * for encontrado a libxml irá gerar Warnings, o que
 * não creio que seja o mais interessante para nós.
 * Para evitar que isso aconteça, você pode determinar
 * que irá obter os erros por sua própria conta. Lembre-se
 * que esta função abaixo deve ser chamada antes de
 * instanciar qualquer objeto da classe DomDocument!
 */
libxml_use_internal_errors(true);

/* Cria um novo objeto da classe DomDocument */
$objDom = new DomDocument();

/* Carrega o arquivo XML */
//$objDom->load("ap_AgentePúblico.xml");
$objDom->load($xml);

/* Tenta validar os dados utilizando o arquivo XSD */
//if (!$objDom->schemaValidate("AUDESP_AGENTEPUBLICO_2020_A.XSD")) {
if (!$objDom->schemaValidate($xsd)) {

    /**
     * Se não foi possível validar, você pode capturar
     * todos os erros em um array
     */
    $arrayAllErrors = libxml_get_errors();
   
    /**
     * Cada elemento do array $arrayAllErrors
     * será um objeto do tipo LibXmlError
     */
    print_r($arrayAllErrors);
   
} else {

    /* XML validado! */
    echo "XML obedece às regras definidas no arquivo XSD......(.. Validação OK ..) ....!\n\n";
   
}

?>