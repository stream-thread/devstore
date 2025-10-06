<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Store;

class StoreController extends Controller
{
    public function actionIndex()
    {
        $query = Store::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $stores = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'stores' => $stores,
            'pagination' => $pagination,
        ]);
    }
}