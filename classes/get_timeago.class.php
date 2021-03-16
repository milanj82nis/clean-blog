<?php
class get_timeago
{
    private static $seconds = 1;
    private static $minute = 60;
    private static $hour = 3600;
    private static $day = 86400;
    private static $month = 2592000;
    private static $year = 31104000;

    public function get_lang($lang, $r = "")
    {
        $array = array(
          //Español
          "es" => array("less"=>"Hace menos de 1 segundo",
                       "year"=>"Hace un a&ntilde;o",
                       "month"=>"Hace un mes",
                       "day"=>"Hace un d&iacute;a",
                       "hour"=>"Hace una hora",
                       "minute"=>"Hace un minuto",
                       "second"=>"Hace un segundo"),
          "es2" => array("year", "Hace $r años",
                       "month"=>"Hace $r meses",
                       "day"=>"Hace $r d&iacute;as",
                       "hour"=>"Hace $r horas",
                       "minute"=>"Hace $r minutos",
                       "second"=>"Hace $r segundos"),
          //English
          "en" => array("less"=>"less than 1 second ago",
                       "year"=>"about 1 year ago",
                       "month"=>"about 1 month ago",
                       "day"=>"about 1 day ago",
                       "hour"=>"about 1 hour ago",
                       "minute"=>"about 1 minute ago",
                       "second"=>"about 1 second ago"),
          "en2" => array("year"=>"about $r years ago",
                       "month"=>"about $r months ago",
                       "day"=>"about $r days ago",
                       "hour"=>"about $r hours ago",
                       "minute"=>"about $r minutes ago",
                       "second"=>"about $r seconds ago")
          );

        return $array[$lang];
    }
  
    public function timeago($time, $lang = "en")
    {
        $strtotime = time() - strtotime($time);
        $lan = self::get_lang($lang);

        if($strtotime < 1)
          return $lan['less'];

        $artime = array(self::$year  =>  'year',
                        self::$month =>  'month',
                        self::$day   =>  'day',
                        self::$hour  =>  'hour',
                        self::$minute=>  'minute',
                        self::$seconds=>  'second');

        foreach($artime as $s => $string)
        {
            $day = $strtotime / $s;

            if($day >= 1)
            {
                $r = round($day);
                $get = self::get_lang(($r > 1) ? $lang."2" : $lang, $r);
                return $get[$string];
            }
        }
    }
}
?>
