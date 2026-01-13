import BillingController from './BillingController'
import CheckoutController from './CheckoutController'
import StripeWebhookController from './StripeWebhookController'

const Controllers = {
    BillingController: Object.assign(BillingController, BillingController),
    CheckoutController: Object.assign(CheckoutController, CheckoutController),
    StripeWebhookController: Object.assign(StripeWebhookController, StripeWebhookController),
}

export default Controllers