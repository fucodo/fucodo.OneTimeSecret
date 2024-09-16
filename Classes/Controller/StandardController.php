<?php
namespace fucodo\OneTimeSecret\Controller;

/*
 * This file is part of the fucodo.OneTimeSecret package.
 */

use fucodo\OneTimeSecret\Domain\Model\Secret;
use fucodo\OneTimeSecret\Domain\Repository\SecretRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;

class StandardController extends ActionController
{
    /**
     * @Flow\Inject
     * @var SecretRepository
     */
    protected SecretRepository $secretRepository;

    public function showAction(Secret $secret)
    {
        $this->view->assign('secret', $secret);
    }

    public function showSecretOnceAction(Secret $secret)
    {
        $now = new \DateTimeImmutable('now');
        if ($secret->getExpires() < $now) {
            $secretValue = $secret->getSecretAndSetSeen();
            $this->redirect(
                'show',
                null,
                null,
                [
                    'secret' => $secret
                ]
            );
        }

        try {
            $secretValue = $secret->getSecretAndSetSeen();
        } catch (\Exception $e) {
            $this->redirect(
                'show',
                null,
                null,
                [
                    'secret' => $secret
                ]
            );
        }

        $this->secretRepository->update($secret);

        $this->view->assign('secret', $secret);
        $this->view->assign('secretValue', $secretValue);
    }

    public function informAction(Secret $secret)
    {
        $this->view->assign('secret', $secret);
    }
}
