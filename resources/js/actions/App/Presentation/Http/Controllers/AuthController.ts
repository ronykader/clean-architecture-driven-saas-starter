import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../../wayfinder'
/**
* @see \App\Presentation\Http\Controllers\AuthController::register
* @see app/Presentation/Http/Controllers/AuthController.php:14
* @route '/register'
*/
export const register = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: register.url(options),
    method: 'post',
})

register.definition = {
    methods: ["post"],
    url: '/register',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Presentation\Http\Controllers\AuthController::register
* @see app/Presentation/Http/Controllers/AuthController.php:14
* @route '/register'
*/
register.url = (options?: RouteQueryOptions) => {
    return register.definition.url + queryParams(options)
}

/**
* @see \App\Presentation\Http\Controllers\AuthController::register
* @see app/Presentation/Http/Controllers/AuthController.php:14
* @route '/register'
*/
register.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: register.url(options),
    method: 'post',
})

/**
* @see \App\Presentation\Http\Controllers\AuthController::register
* @see app/Presentation/Http/Controllers/AuthController.php:14
* @route '/register'
*/
const registerForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: register.url(options),
    method: 'post',
})

/**
* @see \App\Presentation\Http\Controllers\AuthController::register
* @see app/Presentation/Http/Controllers/AuthController.php:14
* @route '/register'
*/
registerForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: register.url(options),
    method: 'post',
})

register.form = registerForm

const AuthController = { register }

export default AuthController