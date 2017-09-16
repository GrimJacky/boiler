<?php

namespace App\Http\Controllers\Api;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Orchid\CMS\Core\Models\Page;
use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Core\Models\Role;
use SendGrid;

class BoilersController extends Controller
{
    public function getBoilers($company_name)
    {
        $company = Role::where('slug', '=', $company_name)->first();
        $users = [];
        foreach ($company->getUsers() as $user)
        {
            array_push($users, $user->id);
        }

        $boiler_standard = Post::type('boilers')->whereIn('user_id', $users)->where('content->en->pay-type', 'standard')->get()->toArray();
        $boiler_premium = Post::type('boilers')->whereIn('user_id', $users)->where('content->en->pay-type', 'premium')->get()->toArray();

        $packages = Page::type('page')->whereIn('user_id', $users)->where('slug', $company_name . '-' . 'packages')->first();

        $intro = Page::type('page')->whereIn('user_id', $users)->where('slug', $company_name . '-' . 'intro-screen')->first();

        $credit = Page::type('page')->whereIn('user_id', $users)->where('slug', $company_name . '-' . 'finance')->first();

        return [
            'boilers' => [
                'standard' => is_null($boiler_standard) ? [] : $boiler_standard,
                'premium' => is_null($boiler_premium) ? [] : $boiler_premium
            ],
            'packages' => [
                'standard' => is_null($packages) ? [] : (array)$packages->content['en']['package']['standard'],
                'premium' => is_null($packages) ? [] : (array)$packages->content['en']['package']['premium'],
            ],
            'intro' => is_null($intro) ? [] : $intro->content['en'],
            'credit' => is_null($credit) ? [] : $credit->content['en'],
        ];
    }

    public function createOrder($company_name, Request $request)
    {
            $request = (object)$request->all();
            Post::create([
                'user_id'    => Role::where('slug', $company_name)->first()->getUsers()->first()->id,
                'type'       => 'order',
                'content'    => [
                    'en' => [
                        'name'        => $request->contact['name'],
                        'email'       => $request->contact['email'],
                        'phone'       => $request->contact['phone'],
                        'address'     => $request->contact['address'],
                        'house'       => $request->home,
                        'bedrooms'    => $request->bedroom,
                        'bathrooms'   => $request->bathroom,
                        'cylinder'    => $request->cylinder,
                    ],
                ],
                'options'    => [
                    'locale' => [
                        'en' => true,
                    ],
                    'boiler' => $request->package
                ],
                'publish_at' => Carbon::now(),
                'slug'       => $request->contact['name'],
            ]);
        try{
            $this->sendMail($request);
        }
        catch (\Throwable $e)
        {
            die;
        }

    }

    public function sendMail($request)
    {
        $email_template = Post::where('slug', 'quote-email-template')->first();

        $from = new SendGrid\Email($email_template->content['en']['from'], $email_template->content['en']['reply_to']);
        $subject = str_replace('*|NAME|*', $request->contact['name'], $email_template->content['en']['subject']);
        $to = new SendGrid\Email($request->contact['name'], $request->contact['email']);

        $quote = view('quote', $request->package);

        $message = str_replace('*|QUOTE|*', $quote, str_replace('*|NAME|*', $request->contact['name'], $email_template->content['en']['body']));


        $content = new SendGrid\Content("text/html", $message);
        $mail = new SendGrid\Mail($from, $subject, $to, $content);

        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $sg->client->mail()->send()->post($mail);
    }
}
