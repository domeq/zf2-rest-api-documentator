<?php
namespace WidRestApiDocumentator\Controller;

use WidRestApiDocumentator\Strategy\Standard;
use Zend\Mvc\Controller\AbstractActionController;

class DocsController extends AbstractActionController
{
    /**
     * @return \WidRestApiDocumentator\Service\Docs
     */
    public function getDocsService()
    {
        return $this->getServiceLocator()->get('WidRestApiDocumentator\Service\Docs');
    }

    public function listAction()
    {
        $this->layout()->setTemplate('wid-rest-api-documentator/docs/layout');

        /** @var $rq \Zend\Http\PhpEnvironment\Request */
        $rq = $this->getRequest();
        $service = $this->getDocsService();
        return array(
            'dataSet' => $service->getList($rq->getQuery('page'), $rq->getQuery('limit')),
        );
    }

    public function showAction()
    {
        $this->layout()->setTemplate('wid-rest-api-documentator/docs/layout');

        $id = $this->params('id');
        $showBackLink = $this->params('show_back_link', 1);
        $service = $this->getDocsService();
        return array(
            'id' => $id,
            'data' => $service->getOne($id),
            'showBackLink' => (bool) $showBackLink
        );
    }
}