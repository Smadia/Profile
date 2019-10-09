<?php

namespace App\Http\Controllers;

use App\Client;
use App\Message;
use App\Portofolio;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Halaman awal web
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $services = Service::all();
        $clients = Client::all();
        $team = User::query()
            ->whereDoesntHave('role')
            ->get();

        return view('profile.index', [
            'services' => $services,
            'clients' => $clients,
            'team' => $team
        ]);
    }

    /**
     * halaman portofolio
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function portfolio()
    {
        $services = Service::all();
        $portofolios = Portofolio::all();

        return view('profile.portfolio', [
            'services' => $services,
            'portofolios' => $portofolios
        ]);
    }

    public function message(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $newMessage = Message::query()
            ->create($request->all());
        $newMessage->info = json_encode(geoip()->getLocation()->toArray());
        $newMessage->save();

        return back()->with('success', 'Your message has been sent. Thank you!');
    }
}
