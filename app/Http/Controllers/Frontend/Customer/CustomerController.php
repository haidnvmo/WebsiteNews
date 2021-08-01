<?php

namespace App\Http\Controllers\Frontend\Customer;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\Customer;
use App\Models\User;
use Socialite;
use Auth;

class CustomerController extends Controller
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        return  Socialite::driver($driver)->redirect();

        //$this->registerGoogleLoginUser($user);

        return redirect()->route('home.index');
    }
    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();
        $user = $this->registerGoogleLoginUser($getInfo, $provider);
        dd($user);
        auth()->login($user);

        return redirect()->to('/');
    }

    protected function registerGoogleLoginUser($data, $provider)
    {
        $customer = Customer::where('provider_id', $data->id)->first();
        if (!$customer) {
            $customer = Customer::create([
            'name' => $data->name,
            'email' => $data->email,
            'provider_id' => $data->id,
            'provider_name' => $provider,
            'avatar' => $data->avatar,
            ]);          
        }  
        return $customer;
        
    }
}
