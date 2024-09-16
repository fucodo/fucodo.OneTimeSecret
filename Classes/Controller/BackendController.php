<?php
namespace fucodo\OneTimeSecret\Controller;

use fucodo\OneTimeSecret\Domain\Model\Secret;
use fucodo\OneTimeSecret\Domain\Repository\SecretRepository;
use KayStrobach\Backend\Controller\AbstractPageRendererController;
use Neos\Flow\Annotations as Flow;

class BackendController extends AbstractPageRendererController
{
    /**
     * @Flow\Inject
     * @var SecretRepository
     */
    protected $secretRepository;

    public function indexAction()
    {
        $this->view->assign('objects', $this->secretRepository->findAll());
    }

    public function newAction()
    {
        $this->view->assign('secret', new Secret(''));
    }

    /**
     * @Flow\Validate(validationGroups={"Default", "Create"})
     * @param Secret $secret
     * @return void
     * @throws \Neos\Flow\Mvc\Exception\StopActionException
     * @throws \Neos\Flow\Persistence\Exception\IllegalObjectTypeException
     */
    public function createAction(Secret $secret)
    {
        $this->secretRepository->add($secret);
        $this->redirect('index');
    }
}
