import BillingController from './BillingController'
import CheckoutController from './CheckoutController'
import StripeWebhookController from './StripeWebhookController'
import SubscriptionController from './SubscriptionController'
import AdminBillingController from './AdminBillingController'
import AdminBillingExportController from './AdminBillingExportController'

const Controllers = {
    BillingController: Object.assign(BillingController, BillingController),
    CheckoutController: Object.assign(CheckoutController, CheckoutController),
    StripeWebhookController: Object.assign(StripeWebhookController, StripeWebhookController),
    SubscriptionController: Object.assign(SubscriptionController, SubscriptionController),
    AdminBillingController: Object.assign(AdminBillingController, AdminBillingController),
    AdminBillingExportController: Object.assign(AdminBillingExportController, AdminBillingExportController),
}

export default Controllers