<?php

require_once "OdczytDanychService.php";
require_once "OperacjeNaZbiorachService.php";

class OperacjeNaZbiorachFacade {

    public function wczytajDane($nazwaPliku) {

        $odczytDanych = new OdczytDanychService();
        $odczytDanych->setNazwaPliku($nazwaPliku);
        $odczytDanych->odczytaj();
        $zbiory = $odczytDanych->getZbiory();
        return $zbiory;
    }

    public function oblicz($zbiory) {

        $operacjeNaZbiorach = new OperacjeNaZbiorachService();
        $operacjeNaZbiorach->setZbiory($zbiory);
        $operacjeNaZbiorach->roznica();
        $wynik = $operacjeNaZbiorach->getWynik();
        return $wynik;
    }

    public function oblicz2($zbiory) {

        $operacjeNaZbiorach = new OperacjeNaZbiorachService();
        $operacjeNaZbiorach->setZbiory($zbiory);
        $operacjeNaZbiorach->iloczyn();
        $wynik = $operacjeNaZbiorach->getWynik();
        return $wynik;
    }
}
