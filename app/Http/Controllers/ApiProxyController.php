<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiProxyController extends Controller
{
    private $apiBaseUrl = 'https://postback-sms.com/api/';
    private $testToken = '5994c91001f57eea808aff11738d752a';

    public function getNumber(Request $request)
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get($this->apiBaseUrl, [
            'action' => 'getNumber',
            'country' => $request->input('country'),
            'service' => $request->input('service'),
            'token' => $this->testToken,
            'rent_time' => $request->input('rent_time'),
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function getSms(Request $request)
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get($this->apiBaseUrl, [
            'action' => 'getSms',
            'token' => $this->testToken,
            'activation' => $request->input('activation'),
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function cancelNumber(Request $request)
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get($this->apiBaseUrl, [
            'action' => 'cancelNumber',
            'token' => $this->testToken,
            'activation' => $request->input('activation'),
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function getStatus(Request $request)
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get($this->apiBaseUrl, [
            'action' => 'getStatus',
            'token' => $this->testToken,
            'activation' => $request->input('activation'),
        ]);

        return response()->json($response->json(), $response->status());
    }
}
