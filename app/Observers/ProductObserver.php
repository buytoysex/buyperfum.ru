<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Subscription;

class ProductObserver
{

    public function updating(Product $product)
    {
        $oldCount = $product->getOriginal('count'); // получаем значение, которое было до обновления модели

        if ($oldCount == 0 && $product->count > 0){
            Subscription::sendEmailsBySubscription($product);
        }
    }

}
