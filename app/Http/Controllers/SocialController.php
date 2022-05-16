<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Redirecting the user to facebook Login
     */
    public function rediect($driver)
    {
            return Socialite::driver($driver)->redirect();
    }//end method

    
    public function callback($driver)
    {
        $providerUser = Socialite::driver($driver)->user();
        $user = $this->createOrGetUser($providerUser , $driver);
        if(!$user)
            $user = $this->createOrGetUser($providerUser , $driver);
        auth()->login($user);
        return redirect()->to('/home');
    }//end method


    /**
     * Get The User if Registered Before.
     * If Not => Create New One
     */
    public function createOrGetUser($providerUser , $driver)
    {
        $account = SocialAccount::whereProvider($driver)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account)
            return $account->user;
        else
            return $this->createNewUser($providerUser , $driver);
    }//end metohd



    /**
     * Creating New User
     */
    public function createNewUser($providerUser , $driver)
    {
        $account = new SocialAccount([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $driver,
        ]);

        $user = User::whereEmail($providerUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'password' => Hash::make(rand(1,10000)),
            ]);
        }
        $account->user()->associate($user);
        $account->save();
        return $user;
    }//end method



}
