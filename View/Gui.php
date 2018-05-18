<?php

require_once "./Model/OperacjeNaZbiorachFacade.php";

class Gui {

    public function onClickWczytaj() {

        $nazwaPliku = $_FILES['doc']['tmp_name'];
        $fasada = new OperacjeNaZbiorachFacade();
        $_SESSION['zbiory'] = $fasada->wczytajDane($nazwaPliku);
        $daneWczytane = "Dane wczytane";
        return print_r($daneWczytane, TRUE);
    }

    public function onClickOblicz() {
        $zbiory = $_SESSION['zbiory'];
        $fasada = new OperacjeNaZbiorachFacade();
        $_SESSION['wynik'] = $fasada->oblicz($zbiory);
        $obliczeniaWykonane = "Obliczenia wykonane";
        return print_r($obliczeniaWykonane, TRUE);
    }

        public function onClickOblicz2() {
        $zbiory = $_SESSION['zbiory'];
        $fasada = new OperacjeNaZbiorachFacade();
        $_SESSION['wynik'] = $fasada->oblicz2($zbiory);
        $obliczeniaWykonane = "Obliczenia wykonane";
        return print_r($obliczeniaWykonane, TRUE);
    }
    
    public function onClickPokazWynik() {
        $wynik = $_SESSION['wynik'];
        return print_r($wynik, TRUE); // przygotowuję zmienną z wynikiem
    }

    public function showWindow($wynikObliczen, $daneWczytane, $obliczeniaWykonane, $obliczeniaWykonane2, $zbiory) {
        $html = file_get_contents("View/gui.xhtml"); // pobieram plik z szablonem
        $search = array(":wynik:", ":daneWczytane:", ":obliczeniaWykonane:", ":obliczeniaWykonane2:", ":wczytane:"); // co ma być wyszukiwane w szablonie
        $replace = array($wynikObliczen, $daneWczytane, $obliczeniaWykonane, $obliczeniaWykonane2, $zbiory); // czym zastąpić $search
        $html = str_replace($search, $replace, $html); // zastępuję elementy $search
        echo $html; // wyświetlam
    }

}
