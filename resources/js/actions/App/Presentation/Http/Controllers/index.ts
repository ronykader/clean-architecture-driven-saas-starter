import BillingController from './BillingController'
import CheckoutController from './CheckoutController'

const Controllers = {
    BillingController: Object.assign(BillingController, BillingController),
    CheckoutController: Object.assign(CheckoutController, CheckoutController),
}

export default Controllers