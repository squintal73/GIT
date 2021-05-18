<?php

namespace Urbem\CoreBundle\Model\Management;

use Doctrine\ORM;
use Urbem\CoreBundle\AbstractModel;

class ProductModel extends AbstractModel
{
    protected $entityManager = null;
    protected $repository = null;

    public function __construct(ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository("CoreBundle:Management\Product");
    }

}
