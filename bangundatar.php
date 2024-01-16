<?php

class BangunDatarDescriptor {
    public static function describe($bangunDatar) {
        if ($bangunDatar instanceof Lingkaran) {
            return "Bangun datarnya ialah lingkaran dengan luas " . $bangunDatar->area() . " dan keliling " . $bangunDatar->circumference();
        } elseif ($bangunDatar instanceof PersegiPanjang) {
            return "Bangun datarnya ialah persegi panjang dengan luas " . $bangunDatar->area() . " dan keliling " . $bangunDatar->circumference();
        } elseif ($bangunDatar instanceof Persegi) {
            return "Bangun datarnya ialah persegi dengan luas " . $bangunDatar->area() . " dan keliling " . $bangunDatar->circumference();
        } else {
            return "Bangun datar tidak dikenali";
        }
    }
}

interface BangunDatar {
    public function area();
    public function circumference();
    public function enlarge($scale);
    public function shrink($scale);
}

class Lingkaran implements BangunDatar {
    private $jariJari;

    public function __construct($jariJari) {
        $this->jariJari = $jariJari;
    }

    public function area() {
        return 3.14 * $this->jariJari * $this->jariJari;
    }

    public function circumference() {
        return 2 * 3.14 * $this->jariJari;
    }

    public function enlarge($scale) {
        $this->jariJari *= $scale;
    }

    public function shrink($scale) {
        $this->jariJari /= $scale;
    }
}

class PersegiPanjang implements BangunDatar {
    private $panjang;
    private $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function area() {
        return $this->panjang * $this->lebar;
    }

    public function circumference() {
        return 2 * ($this->panjang + $this->lebar);
    }

    public function enlarge($scale) {
        $this->panjang *= $scale;
        $this->lebar *= $scale;
    }

    public function shrink($scale) {
        $this->panjang /= $scale;
        $this->lebar /= $scale;
    }
}

class Persegi implements BangunDatar {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function area() {
        return $this->sisi * $this->sisi;
    }

    public function circumference() {
        return 4 * $this->sisi;
    }

    public function enlarge($scale) {
        $this->sisi *= $scale;
    }

    public function shrink($scale) {
        $this->sisi /= $scale;
    }
}

$lingkaran = new Lingkaran(5);
$persegiPanjang = new PersegiPanjang(4, 6);
$persegi = new Persegi(3);

echo BangunDatarDescriptor::describe($lingkaran) . PHP_EOL;

// Memperbesar lingkaran dengan skala 2
$lingkaran->enlarge(2);
echo "Setelah diperbesar: " . BangunDatarDescriptor::describe($lingkaran) . PHP_EOL;

// Memperkecil lingkaran dengan skala 0.5
$lingkaran->shrink(1.5);
echo "Setelah diperkecil: " . BangunDatarDescriptor::describe($lingkaran) . PHP_EOL;

echo BangunDatarDescriptor::describe($persegiPanjang) . PHP_EOL;

// Memperbesar persegi panjang dengan skala 1.5
$persegiPanjang->enlarge(1.5);
echo "Setelah diperbesar: " . BangunDatarDescriptor::describe($persegiPanjang) . PHP_EOL;

// Memperkecil persegi panjang dengan skala 0.8
$persegiPanjang->shrink(2);
echo "Setelah diperkecil: " . BangunDatarDescriptor::describe($persegiPanjang) . PHP_EOL;

echo BangunDatarDescriptor::describe($persegi) . PHP_EOL;

// Memperbesar persegi dengan skala 3
$persegi->enlarge(3);
echo "Setelah diperbesar: " . BangunDatarDescriptor::describe($persegi) . PHP_EOL;

// Memperkecil persegi dengan skala 0.5
$persegi->shrink(2);
echo "Setelah diperkecil: " . BangunDatarDescriptor::describe($persegi) . PHP_EOL;

?>
