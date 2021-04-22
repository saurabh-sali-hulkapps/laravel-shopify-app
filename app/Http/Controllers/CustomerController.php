<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->get(env('SHOPIFY_API_DOMAIN') . 'customers.json')->json();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->post(env('SHOPIFY_API_DOMAIN') . 'customers.json', $request->all())->json();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->get(env('SHOPIFY_API_DOMAIN') . 'customers/' . $id . '.json')->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function update(Request $request, string $id)
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->put(env('SHOPIFY_API_DOMAIN') . 'customers/' . $id . '.json', $request->all())->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Response
     */
    public function destroy(string $id)
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->delete(env('SHOPIFY_API_DOMAIN') . 'customers/' . $id . '.json')->json();
    }
}
