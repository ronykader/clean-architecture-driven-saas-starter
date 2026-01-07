import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../wayfinder'
/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:11
* @route '/billing/plans'
*/
export const plans = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: plans.url(options),
    method: 'get',
})

plans.definition = {
    methods: ["get","head"],
    url: '/billing/plans',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:11
* @route '/billing/plans'
*/
plans.url = (options?: RouteQueryOptions) => {
    return plans.definition.url + queryParams(options)
}

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:11
* @route '/billing/plans'
*/
plans.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: plans.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:11
* @route '/billing/plans'
*/
plans.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: plans.url(options),
    method: 'head',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:11
* @route '/billing/plans'
*/
const plansForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: plans.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:11
* @route '/billing/plans'
*/
plansForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: plans.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:11
* @route '/billing/plans'
*/
plansForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: plans.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

plans.form = plansForm

const BillingController = { plans }

export default BillingController