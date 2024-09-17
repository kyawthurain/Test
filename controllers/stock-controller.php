<?php
include_once "../models/stock.php";

class StockController{
    public function getStockByStore($store_id){
        $stock = new Stock();
        return $stock->getStocksByStore($store_id);
    }
}
