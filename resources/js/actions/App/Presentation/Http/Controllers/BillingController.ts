import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../wayfinder'
/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:19
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
* @see app/Presentation/Http/Controllers/BillingController.php:19
* @route '/billing/plans'
*/
plans.url = (options?: RouteQueryOptions) => {
    return plans.definition.url + queryParams(options)
}

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:19
* @route '/billing/plans'
*/
plans.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: plans.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:19
* @route '/billing/plans'
*/
plans.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: plans.url(options),
    method: 'head',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:19
* @route '/billing/plans'
*/
const plansForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: plans.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:19
* @route '/billing/plans'
*/
plansForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: plans.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::plans
* @see app/Presentation/Http/Controllers/BillingController.php:19
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

/**
* @see \App\Presentation\Http\Controllers\BillingController::index
* @see app/Presentation/Http/Controllers/BillingController.php:12
* @route '/billing'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/billing',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Presentation\Http\Controllers\BillingController::index
* @see app/Presentation/Http/Controllers/BillingController.php:12
* @route '/billing'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Presentation\Http\Controllers\BillingController::index
* @see app/Presentation/Http/Controllers/BillingController.php:12
* @route '/billing'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::index
* @see app/Presentation/Http/Controllers/BillingController.php:12
* @route '/billing'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::index
* @see app/Presentation/Http/Controllers/BillingController.php:12
* @route '/billing'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::index
* @see app/Presentation/Http/Controllers/BillingController.php:12
* @route '/billing'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Presentation\Http\Controllers\BillingController::index
* @see app/Presentation/Http/Controllers/BillingController.php:12
* @route '/billing'
*/
indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

index.form = indexForm

const BillingController = { plans, index }

export default BillingController