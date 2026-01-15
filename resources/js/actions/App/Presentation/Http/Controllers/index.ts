import BillingController from './BillingController'
import CheckoutController from './CheckoutController'
import StripeWebhookController from './StripeWebhookController'
import SubscriptionController from './SubscriptionController'

const Controllers = {
    BillingController: Object.assign(BillingController, BillingController),
    CheckoutController: Object.assign(CheckoutController, CheckoutController),
    StripeWebhookController: Object.assign(StripeWebhookController, StripeWebhookController),
    SubscriptionController: Object.assign(SubscriptionController, SubscriptionController),
}

export default Controllers