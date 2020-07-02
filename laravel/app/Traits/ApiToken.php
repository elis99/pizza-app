<?php

namespace App\Traits;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use DB;
use App\Http\Resources\TokenResource;
use Laravel\Passport\HasApiTokens;

trait ApiToken
{
    use HasApiTokens;

    protected $accessToken;

    public function revokeTokens()
    {
        DB::table('oauth_access_tokens')
            ->where('user_id', $this->id)
            ->update([
                'revoked' => true
            ]);
    }

    public function createToken(string $password)
    {
        //for generating Token need to use Laravel Password Grant Client
        $oauth_client = \DB::table('oauth_clients')
            ->where('personal_access_client', 0)
            ->first();

        if (!$oauth_client) {
            throw new \Exception('oauth_client not found');
        }

        $data = [
            'grant_type' => 'password',
            'client_id' => $oauth_client->id,
            'client_secret' => $oauth_client->secret,
            'username' => $this->email,
            'password' => $password, //requires unhashed password
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        $response = app()
            ->handle($request)
            ->getContent();

            dd($response);

        $token = json_decode($response);

        if (isset($token->error)) {
            throw new AuthorizationException;
        }

        return TokenResource::make($token);
    }

    public function withAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function validateForPassportPasswordGrant($data)
    {
        return true;
    }

}
