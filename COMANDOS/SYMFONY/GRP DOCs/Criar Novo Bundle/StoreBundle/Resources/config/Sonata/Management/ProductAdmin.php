<?php

namespace Urbem\StoreBundle\Resources\config\Sonata\Management;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Validator\Constraints as Assert;
use Urbem\CoreBundle\Model\Management\ProductModel;

use Urbem\CoreBundle\Resources\config\Sonata\AbstractSonataAdmin as AbstractAdmin;

/**
 * Class ProductAdmin
 *
 * @package Urbem\StoreBundle\Resources\config\Sonata\Management
 */
class ProductAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'urbem_store_management_product';
    protected $baseRoutePattern = 'store/management/product';
    protected $includeJs = [
        '/store/javascripts/management/product.js'
    ];

    protected $datagridValues = [
        '_page'       => 1,
        '_sort_order' => 'DESC',
        '_sort_by'    => 'codProduct',
    ];

    /**
     * Rotas permitidas
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list', 'create', 'edit', 'show', 'delete']);
    }

    /**
     * Campos de pesquisa
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('codProduct', null, ['label' => 'Código'])
            ->add('name', null, ['label' => 'Nome'])
        ;
    }

    /**
     * Listagem
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $this->setBreadCrumb();

        $listMapper
            ->add('codProduct', null, ['label' => 'Código'])
            ->add('name', null, ['label' => 'Nome'])
        ;

        $this->addActionsGrid($listMapper);
    }

    /**
     * Ações para cada item da listagem detalhes, edição e remoção
     * {@inheritdoc}
     */
    protected function addActionsGrid(ListMapper $listMapper)
    {
        $listMapper
            ->add('_action', 'actions', [
                'actions' => [
                    'show' => ['template' => 'CoreBundle:Sonata/CRUD:list__action_show.html.twig'],
                    'edit' => ['template' => 'CoreBundle:Sonata/CRUD:list__action_edit.html.twig'],
                    'delete' => ['template' => 'CoreBundle:Sonata/CRUD:list__action_delete.html.twig']
                ],
            ]);
    }

    /**
     * Validação a nível de backend antes do pré persist
     * @param ErrorElement $errorElement
     * @param $object
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $this->getRequest()->getSession()->getFlashBag()->clear();

        if (strlen($object->getName()) < 3) {
            $message = $this->getTranslator()->trans('Nome deve ser maior que 3 caracteres');
            $errorElement->with('name')->addViolation($message)->end();
            $this->getRequest()->getSession()->getFlashBag()->add("custom_erro", $message);
        }
    }

    /**
     * Configura formulário de criação e edição
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $id = $this->getAdminRequestId();
        $this->setBreadCrumb($id ? ['id' => $id] : []);

        $lengthConstraint = new Assert\Length([
            'max'        => 100,
            'maxMessage' => $this->trans('default.errors.lengthExceeded', ['%number%' => 100], 'validators')
        ]);

        $fieldOptions['name'] = [
            'label' => 'Nome',
            'required' => true,
            'constraints' => [$lengthConstraint]
        ];

        $fieldOptions['password'] = [
            'label' => 'Senha',
            'required' => true,
            'constraints' => [$lengthConstraint]
        ];

        if ($this->id($this->getSubject())) {
            // $fieldOptions['name']['disabled'] = true;
        }
        
        $formMapper
            ->with('Dados para Produto')
            ->add('name', 'text', $fieldOptions['name'])
            ->end()
        ;
    }

    /**
     * Antes de inserir no banco de dados
     */
    public function prePersist($object)
    {
    }

    /**
     * Depois de inserir no banco de dados
     */
    public function postPersist($object)
    {
    }

    /**
     * Depois de atualizar no banco de dados
     */
    public function preUpdate($object)
    {
    }

    /**
     * Depois de atualizar no banco de dados
     */
    public function postUpdate($object)
    {
    }

    /**
     * Antes de remover
     */
    public function preRemove($object)
    {
    }

    /**
     * Depois de remover
     */
    public function postRemove($object)
    {
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $id = $this->getAdminRequestId();
        $this->setBreadCrumb(['id' => $id]);

        $showMapper
            ->with('Detalhes para Produto')
            ->add('codProduct', null, ['label' => 'Código'])
            ->add('name', null, ['label' => 'Nome'])
        ;
    }

    /**
     * @param mixed $object
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof Product
            ? sprintf('%d - %s', $object->getCodProduct(), $object->getName())
            : 'Produto';
    }

}
