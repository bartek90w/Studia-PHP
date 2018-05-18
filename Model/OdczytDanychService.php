<?php

/**
 * Klasa odczytujaca dane z pliku.
 */
class OdczytDanychService {

    private $nazwaPliku;
    private $zbiory;

    public function getNazwaPliku() {
        return $this->nazwaPliku;
    }

    public function getZbiory() {
        return $this->zbiory;
    }

    public function setNazwaPliku($nazwaPliku) {
        $this->nazwaPliku = $nazwaPliku;
    }

    public function setZbiory($zbiory) {
        $this->zbiory = $zbiory;
    }

    public function odczytaj() {
        $zbiory = array(); //punkt 1
        $zbior = array(); //punkt 2
        $plik = fopen($this->nazwaPliku, 'r'); //punkt 3
        if (FALSE === $plik) {
            throw new Exception('Błąd przy otwieraniu pliku');
        }
        while (FALSE === feof($plik)) { //punkt 4
            $linia = fgets($plik, 4096); //punkt 4.1
            if (FALSE === $linia) { //punkt 4.2
                break;
            }

            $znaki = array(" ", "\t", "\r", "\n"); //punkt 4.3
            $noweZnaki = "";
            $linia = str_replace($znaki, $noweZnaki, $linia);

            $znak1 = substr($linia, 0, 1);
            $znakN = substr($linia, -1);
            if ($znak1 != "{" && $znakN != "}") { //punkt 4.4
                break;
            }

            $linia = rtrim($linia, "}"); //punkt 4.5
            $linia = ltrim($linia, "{");

            $zbior = explode(",", $linia); // punkt 4.6
            $zbiory[] = $zbior; //punkt 4.7
        }
        fclose($plik); //punkt 5

        $this->zbiory = $zbiory; //punkt 6
    }

}

?>
