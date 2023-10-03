<?php

namespace App\Http\Controllers;

use Exception;
use Goutte\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'link' => 'required|max:500'
        ]);

        $action = $request->input('action');
        $url = $request->link;

        try {
            $client = new Client();
            $crawler = $client->request('GET', $url);
            $productInfo = [];

            switch ($action) {
                case 'trendyol':
                    $nameElement = $crawler->filter('.pr-new-br span')->first();
                    if ($nameElement->count() > 0) {
                        $productInfo['name'] = $nameElement->text();
                    }

                    $priceElement = $crawler->filter('.prc-dsc')->first();
                    if ($priceElement->count() > 0) {
                        $productInfo['price'] = $priceElement->text();
                    }

                    $imgElements = $crawler->filter('.gallery-modal .gallery-modal-content img');
                    if ($imgElements->count() > 0) {
                        $firstImageElement = $imgElements->first();
                        $productInfo['image'] = $firstImageElement->attr('src');
                    }

                    $descElement = $crawler->filter('.detail-attr-container')->first();
                    if ($descElement->count() > 0) {
                        $productInfo['description'] = $descElement->text();
                    }
                    break;

                case 'defacto':
                    $nameElement = $crawler->filter('.product-card__name')->first();
                    if ($nameElement->count() > 0) {
                        $productInfo['name'] = $nameElement->text();
                    }

                    $priceElement = $crawler->filter('.sale')->first();
                    if ($priceElement->count() > 0) {
                        $productInfo['price'] = $priceElement->text();
                    }

                    $imgElements = $crawler->filter('.swiper-wrapper .swiper-slide img');
                    if ($imgElements->count() > 0) {
                        $firstImageElement = $imgElements->first();
                        $productInfo['image'] = $firstImageElement->attr('data-src');
                    }

                    $descElement = $crawler->filter('.col-12 li')->first();
                    if ($descElement->count() > 0) {
                        $productInfo['description'] = $descElement->text();
                    }
                    break;

                default:
                    return view('product', ['error' => 'Invalid transaction']);
                    break;
            }

            return view('product', compact('productInfo'));
        } catch (Exception $e) {
            return view('product', ['error' => $e->getMessage()]);
        }
    }


}
