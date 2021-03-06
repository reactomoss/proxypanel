<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Port;
use DateTime;
use DateInterval;
use Exception;

class ProxyController extends Controller
{
    public function addProxy(Request $request) {
        // $option = $request->option;
        $name = $request->name;
        // $rotation = $request->rotation;
        $password = self::generatePassword();
        $user = Auth::user();
        $paidTill = self::getPaidTill('option');

        $port = new Port;
        $port->username = $user->name;
        $port->pass = $password;
        $port->paidtill = $paidTill;
        $port->groupname = $name;
        $port->rotation = 0;
        $port->save();

        return redirect('/location_?id='.$port->id);
    }
    
    public function deleteProxy(Request $request) {
        $id = $request->id;

        $port = Port::find($id);

        $name = $port->username.'.'.$port->groupname;
        try {
            $port->delete();
        } catch(Exception $e) {
            return redirect()->back()->with('delete-failed', "Delete failed!");;
        }
        return redirect()->back()->with('delete-success', "{$name} is deleted!");
    }

    function generatePassword() { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
    
        for ($i = 0; $i < 10; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
    
        return $randomString; 
    }

    function getPaidTill($option) {
        $date = new DateTime();
        if ($option == 'monthly') {
            $date->add(new DateInterval('P1M'));
        } else if ($option == 'weekly') {
            $date->add(new DateInterval('P7D'));
        } else if ($option == 'daily') {
            $date->add(new DateInterval('P1D'));
        } else if ($option == 'hour') {
            $date->add(new DateInterval('P1H'));
        }
        return $date->format('Y-m-d H:i:s');
    }

    function changeProxyIP($username, $nickname) {
        echo($username);
        echo($nickname);
        echo("changeProxyIP");
    }

    function changeProxyLocation($username, $nickname, $location) {
        echo($username);
        echo($nickname);
        echo($location);
        echo("changeProxyLocation");
    }

    function connectRandomLocation($username, $nickname) {
        echo($username);
        echo($nickname);
        echo("connectRandomLocation");
    }

    function listLocations() {
        echo("listLocations");
    }

    function updateProxyRotation($username, $nickname, $rotation) {
        echo($username);
        echo($nickname);
        echo($rotation);
        echo("updateProxyRotation");
    }
}
