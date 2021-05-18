<?php

namespace Application\Migrations;

use Urbem\CoreBundle\Helper\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210422211122 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');
        
        $this->insertRoute('store', 'Loja', 'home-urbem');
        $this->addSql("INSERT INTO administracao.configuracao (exercicio, cod_modulo, parametro, valor) VALUES('9999', 2, 'menu_store', 'true')");

        $this->addSql("CREATE SCHEMA IF NOT EXISTS store");
        $this->addSql("ALTER SCHEMA store OWNER TO docker");

        $this->addSql('CREATE TABLE IF NOT EXISTS store.product (
            cod_product integer NOT NULL GENERATED BY DEFAULT AS IDENTITY,
            name character varying(100) NOT NULL,
            CONSTRAINT pk_store_management_product_cod_product PRIMARY KEY (cod_product)
        )');

        $this->insertRoute('urbem_store_management_product_list', 'Produto', 'store');
        $this->insertRoute('urbem_store_management_product_create', 'Novo', 'urbem_store_management_product_list');
        $this->insertRoute('urbem_store_management_product_edit', 'Editar', 'urbem_store_management_product_list');
        $this->insertRoute('urbem_store_management_product_delete', 'Apagar', 'urbem_store_management_product_list');
        $this->insertRoute('urbem_store_management_product_show', 'Detalhes', 'urbem_store_management_product_list');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');
        $this->addSql("DROP TABLE IF EXISTS store.product");
        $this->removeRoute('urbem_store_management_product_create', 'urbem_store_management_product_list');
        $this->removeRoute('urbem_store_management_product_edit', 'urbem_store_management_product_list');
        $this->removeRoute('urbem_store_management_product_delete', 'urbem_store_management_product_list');
        $this->removeRoute('urbem_store_management_product_show', 'urbem_store_management_product_list');
        $this->removeRoute('urbem_store_management_product_list', 'store');
        $this->addSql("DROP SCHEMA IF EXISTS store");
        $this->removeRoute('store', 'home-urbem');

        $this->addSql("DELETE FROM administracao.configuracao
            WHERE exercicio = '9999' AND cod_modulo = 2 AND parametro = 'menu_store'
        ");
    }
}