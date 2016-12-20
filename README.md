# manager
Easily add new or override built-in providers in Laravel Socialite

A package for Laravel Socialite that allows you to easily add new providers or override current providers.

Benefits

You will have access to all of the providers that you load in using the manager.
Instantiation is deferred until Socialite is called
You can override current providers
You can create new providers
Lumen usage is easy
stateless() can be set to true or false
You can override a config dynamically
It retrieves environment variables directly from the .env file instead of also having to configure the services array.
Available Providers

See the zhulei-nj list
You can also make your own or modify someone else's
Reference

Laravel docs about events
Laracasts video on events in Laravel 5
Laravel Socialite Docs
Laracasts Socialite video
Creating a Handler

Below is an example handler. You need to add this full class name to the listen[] in the EventServiceProvider.

See also the Laravel docs about events.
providername is the name of the provider such as meetup.
You will need to change your the namespacing and class names of course.
namespace Your\Name\Space;

use zhulei-nj\Manager\SocialiteWasCalled;

class ProviderNameExtendSocialite
{
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('providername', \Your\Name\Space\Provider::class);
    }
}
Creating a Provider

Look at the already created providers for inspiration.
See this article on Medium
Overriding a Built-in Provider

You can easily override a built-in laravel/socialite provider by creating a new one with exactly the same name (i.e. 'facebook').

Dynamically Passing a Config

You can dynamically pass a config by using:

$clientId = "secret";
$clientSecret = "secret";
$redirectUrl = "http://yourdomain.com/api/redirect";
$additionalProviderConfig = ['site' => 'meta.stackoverflow.com'];
$config = new \zhulei-nj\Manager\Config($clientId, $clientSecret, $redirectUrl, $additionalProviderConfig);
return Socialite::with('provider-name')->setConfig($config)->redirect();
You must call this before you run any Socialite methods.

Creating an OAuth1 Server Class

Take a look at the other OAuth1 providers for inspiration.

Getting the Access Token Response Body

Laravel Socialite by default only allows access to the access_token. Which can be accessed via the \Laravel\Socialite\User->token public property. Sometimes you need access to the whole response body which may contain items such as a refresh_token.

To make this possible, the OAuth2 provider class needs to extend \zhulei-nj\Manager\OAuth2\AbstractProvider and OAuth1 providers need to utilize the \zhulei-nj\Manager\OAuth1\AbstractProvider and \zhulei-nj\Manager\OAuth1\Server.

You can access it from the user object like so: $user->accessTokenResponseBody
