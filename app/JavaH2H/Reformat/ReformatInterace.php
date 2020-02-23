<?php


namespace App\JavaH2H\Reformat;


interface ReformatInterace
{
    public static function make($data);

    public function initialize();

    /* Result from h2h without formating */
    public function getRaw();

    public function distinct();

    public function groupBy($groupBy);

    public function get();
}
