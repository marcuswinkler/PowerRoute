<?php
namespace Mcustiel\PowerRoute\Actions;

use Mcustiel\PowerRoute\Common\TransactionData;

class Redirect implements ActionInterface
{
    use PlaceholderEvaluator;

    public function execute($argument, TransactionData $transactionData)
    {
        return $transactionData->setResponse(
            $transactionData->getResponse()
            ->withHeader(
                'Location',
                $this->getValueOrPlaceholder($argument, $transactionData)
            )
            ->withStatus(302)
        );
    }
}
