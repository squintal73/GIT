<?php

namespace Urbem\StoreBundle\Controller\Management;

use Urbem\CoreBundle\Controller\BaseController;

class ProductController extends BaseController
{
    /**
     * Home
     */
    public function homeAction()
    {
        $this->setBreadCrumb();
        return $this->render('StoreBundle::Management/Product/home.html.twig');
    }
}
