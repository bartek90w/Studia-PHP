<?php

/**
 * Klasa wykonuje operacje na zbiorach
 */
class OperacjeNaZbiorachService {

    private $zbiory;
    private $wynik;

    public function getZbiory() {
        return $this->zbiory;
    }

    public function getWynik() {
        return $this->wynik;
    }

    public function setZbiory($zbiory) {
        $this->zbiory = $zbiory;
    }

    public function setWynik($wynik) {
        $this->wynik = $wynik;
    }

    public function suma() {
        $this->wynik = $this->zbiory[0];
        $ilosc = count($this->zbiory);
        for ($i = 1; $i < $ilosc; $i++) {
            $this->wynik = array_merge($this->wynik, $this->zbiory[$i]);
        }
        $this->wynik= array_unique($this->wynik);
        $this->wynik = array_values($this->wynik);
        return $this->wynik;
    }

    public function iloczyn() {
        $this->wynik = $this->zbiory[0];
        $ilosc = count($this->zbiory);
        for ($i = 1; $i < $ilosc; $i++) {
            $this->wynik = array_intersect($this->wynik, $this->zbiory[$i]);
        }
        $this->wynik = array_values($this->wynik);
        return $this->wynik;
    }

    public function roznica() {
        $this->wynik = $this->zbiory[0];
        $ilosc = count($this->zbiory);
        for ($i = 1; $i < $ilosc; $i++) {
            $this->wynik = array_diff($this->wynik, $this->zbiory[$i]);
        }
        $this->wynik = array_values($this->wynik);
        return $this->wynik;
    }

    public function minimum() {
        $this->wynik = $this->zbiory[0];
        $ilosc = count($this->zbiory);
        for ($i = 1; $i < $ilosc; $i++) {
            $this->wynik = array_merge($this->wynik, $this->zbiory[$i]);
        }
        $this->wynik = array_unique($this->wynik);
        sort($this->wynik);
        $this->wynik = $this->wynik[0];
        return $this->wynik; 
    }

    public function maksimum() {
        $this->wynik = $this->zbiory[0];
        $ilosc = count($this->zbiory);
        for ($i = 1; $i < $ilosc; $i++) {
            $this->wynik = array_merge($this->wynik, $this->zbiory[$i]);
        }
        $this->wynik = array_unique($this->wynik);
        sort($this->wynik);
        $this->wynik = end($this->wynik);
        return $this->wynik; 
    }

}
