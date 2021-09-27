<?php

class Paginator
{
    static $howpages = 9;
    static $shownumber = true;
    static $shownext = true;

    static function showPaginator()
    {
        self::$howpages;
        if (self::$howpages == 5) {
            echo 'какой-то текст';
        } else {
            echo '1,2,3,4';
        }
    }
}

//paginator::showPaginator();
//echo '<hr>';
//paginator::$howpages = 5;
//paginator::showPaginator();


class Illustrator
{
    public int $radius = 10;

    public function makeGraphic()
    {
        echo $this->radius;
    }
}

$ill1 = new Illustrator;
$ill2 = new Illustrator;

$ill1->radius = 8;
$ill2->radius = 25;

echo $ill1->makeGraphic();
echo '<hr>';
echo $ill2->makeGraphic();
