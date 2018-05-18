<?php

require_once "./View/Gui.php";

class Controller {

    const AKCJA_MOJEGO_KONTROLERA_WCZYTAJ_DANE_Z_PLIKU_TXT = 1;
    const AKCJA_MOJEGO_KONTROLERA_WYKONAJ_OPERACJE_NA_ZBIORACH = 2;
    const AKCJA_MOJEGO_KONTROLERA_POKAZ_WYNIK_W_OKIENKU_PRZEGLADARKI = 3;
    const AKCJA_MOJEGO_KONTROLERA_POKAZ_GUI_XHTML_W_PRZEGLADARCE = 4;
    const AKCJA_MOJEGO_KONTROLERA_WYKONAJ_OPERACJE_NA_ZBIORACH2 = 5;

    protected function isWczytajClicked() {
        if (filter_input(INPUT_POST, 'load') === 'Wczytaj') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    protected function isObliczClicked() {
        if (filter_input(INPUT_POST, 'calculation') === 'Oblicz') {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
        protected function isObliczClicked2() {
        if (filter_input(INPUT_POST, 'calculation_2') === 'Oblicz 2') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    protected function isPokazWynikClicked() {
        if (filter_input(INPUT_POST, 'show') === 'Pokaż wynik') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    protected function getAction() {
        if ($this->isWczytajClicked() === TRUE) {
            return self::AKCJA_MOJEGO_KONTROLERA_WCZYTAJ_DANE_Z_PLIKU_TXT;
        }
        if ($this->isObliczClicked() === TRUE) {
            return self::AKCJA_MOJEGO_KONTROLERA_WYKONAJ_OPERACJE_NA_ZBIORACH;
        }
        if ($this->isObliczClicked2() === TRUE) {
            return self::AKCJA_MOJEGO_KONTROLERA_WYKONAJ_OPERACJE_NA_ZBIORACH2;
        }
        if ($this->isPokazWynikClicked() === TRUE) {
            return self::AKCJA_MOJEGO_KONTROLERA_POKAZ_WYNIK_W_OKIENKU_PRZEGLADARKI;
        }

        return self::AKCJA_MOJEGO_KONTROLERA_POKAZ_GUI_XHTML_W_PRZEGLADARCE;
    }

    public function processRequest() {
        $akcja = $this->getAction();
        $gui = new Gui();
        $refer = &$gui;
        $wynikObliczen = ' ';
        $daneWczytane = ' ';
        $obliczeniaWykonane = ' ';
        $obliczeniaWykonane2 = ' ';
        $zbiory = ' ';

        if ($akcja === self::AKCJA_MOJEGO_KONTROLERA_WYKONAJ_OPERACJE_NA_ZBIORACH) {
            $obliczeniaWykonane = $refer->onClickOblicz();
        }

        if ($akcja === self::AKCJA_MOJEGO_KONTROLERA_WYKONAJ_OPERACJE_NA_ZBIORACH2) {
            $obliczeniaWykonane2 = $refer->onClickOblicz2();
        }
        if ($akcja === self::AKCJA_MOJEGO_KONTROLERA_POKAZ_WYNIK_W_OKIENKU_PRZEGLADARKI) {
            $wynikObliczen = $refer->onClickPokazWynik();
        }

        if ($akcja === self::AKCJA_MOJEGO_KONTROLERA_WCZYTAJ_DANE_Z_PLIKU_TXT) {
            $daneWczytane = $refer->onClickWczytaj();
            $zbiory = $_SESSION['zbiory'];
            $zbiory = print_r($zbiory, TRUE);
        }

        $refer->showWindow($wynikObliczen, $daneWczytane, $obliczeniaWykonane, $obliczeniaWykonane2, $zbiory);
    }

}
