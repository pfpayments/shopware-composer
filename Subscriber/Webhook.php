<?php

/**
 * PostFinance Checkout Shopware
 *
 * This Shopware extension enables to process payments with PostFinance Checkout (https://www.postfinance.ch/).
 *
 * @package PostFinanceCheckout_Payment
 * @author customweb GmbH (http://www.customweb.com/)
 * @license http://www.apache.org/licenses/LICENSE-2.0  Apache Software License (ASL 2.0)
 */

namespace PostFinanceCheckoutPayment\Subscriber;

use Enlight\Event\SubscriberInterface;
use PostFinanceCheckoutPayment\Components\Webhook as WebhookService;

class Webhook implements SubscriberInterface
{

    /**
     *
     * @var WebhookService
     */
    private $webhookService;

    public static function getSubscribedEvents()
    {
        return [
            'PostFinanceCheckout_Payment_Config_Synchronize' => 'onSynchronize'
        ];
    }

    /**
     * Constructor.
     *
     * @param WebhookService $webhookService
     */
    public function __construct(WebhookService $webhookService)
    {
        $this->webhookService = $webhookService;
    }

    public function onSynchronize()
    {
        $this->webhookService->install();
    }
}