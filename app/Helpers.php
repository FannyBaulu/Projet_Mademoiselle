<?php

function getPrice($priceInDecimals){
   $price=floatval($priceInDecimals)/100;
   return number_format($price,2,',','').' €';
}

function getTaxe(){
   return  21;
}