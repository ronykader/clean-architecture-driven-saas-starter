import AuthController from './AuthController'
import BillingController from './BillingController'

const Controllers = {
    AuthController: Object.assign(AuthController, AuthController),
    BillingController: Object.assign(BillingController, BillingController),
}

export default Controllers