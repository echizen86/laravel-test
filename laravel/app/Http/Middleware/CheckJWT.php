<?php

namespace App\Http\Middleware;

use Auth0\Login\Contract\Auth0UserRepository;
use Auth0\SDK\Exception\CoreException;
use Auth0\SDK\Exception\InvalidTokenException;
use Closure;

class CheckJWT
{
    protected $userRepository;

    /**
     * CheckJWT constructor.
     *
     * @param Auth0UserRepository $userRepository
     */
    public function __construct(Auth0UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth0 = \App::make('auth0');

        $accessToken = $request->bearerToken();

        if(strlen($accessToken))
        {
            try {

                $tokenInfo = $auth0->decodeJWT($accessToken);

                $user = $this->userRepository->getUserByDecodedJWT($tokenInfo);

                if (!$user)
                {
                    return response()->json(["message" => "Unauthorized User"], 401);
                }

                if(!$user->isRegistered)
                {
                    return response()->json(["id"=> $user->id,"message" => "Incomplete Registration"], 412);
                }

                \Auth::login($user);

            } catch (CoreException $e) {

                return response()->json(["message" => $e->getMessage()], 500);

            } catch (InvalidTokenException $e) {

                return response()->json(["message" => $e->getMessage()], 400);

            }
        }

        return $next($request);
    }
}