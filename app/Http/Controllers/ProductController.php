<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->get(env('SHOPIFY_API_DOMAIN') . 'products.json')->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->post(env('SHOPIFY_API_DOMAIN') . 'products.json', $request->all())->json();
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return array
     */
    public function show(string $id): array
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->get(env('SHOPIFY_API_DOMAIN') . 'products/' . $id . '.json')->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return array
     */
    public function update(Request $request, string $id): array
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->put(env('SHOPIFY_API_DOMAIN') . 'products/' . $id . '.json', $request->all())->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->delete(env('SHOPIFY_API_DOMAIN') . 'products/' . $id . '.json')->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return array
     */
    public function count(): array
    {
        return Http::withBasicAuth(
            Config::get('services.shopify.key'),
            Config::get('services.shopify.token')
        )->get(env('SHOPIFY_API_DOMAIN') . 'products/count.json')->json();
    }
}
