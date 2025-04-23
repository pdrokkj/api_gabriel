<?php

namespace App;

class Geometria
{
    public function calcularAreaRetangulo($base, $altura)
    {
        return $base * $altura;
    }

    public function calcularAreaTriangulo($base, $altura)
    {
        return ($base * $altura) / 2;
    }
}
