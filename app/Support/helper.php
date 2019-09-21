<?php

use Carbon\Carbon;
use App\Custom;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if (!function_exists('hari')) {
    /**
     * Mendapatkan nama hari dari object carbon
     *
     * @param \Carbon\Carbon $carbon
     * @return string
     */
    function hari($carbon)
    {
        $daftarHari = [
            'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];

        return $daftarHari[$carbon->dayOfWeek];
    }
}

if (!function_exists('bulan')) {
    /**
     * Mendapatkan nama bulan dari object carbon
     *
     * @param \Carbon\carbon $carbon
     * @return string
     */
    function bulan($carbon)
    {
        $daftarBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return $daftarBulan[$carbon->month - 1];
    }
}

if (!function_exists('zero_prefix')) {
    /**
     * Memberi tambahan 0 pada angka yang lebih kecil dari 10
     *
     * @param int $number
     * @return string
     */
    function zero_prefix($number)
    {
        if ($number < 10)
            return '0' . $number;

        return $number;
    }
}

if (!function_exists('format_date')) {
    /**
     * Melakukan formatting tanggal
     *
     * @param Carbon $carbon
     * @return string
     */
    function format_date(Carbon $carbon, $namaHari = false, $jam = true, $splitterHari = ', ')
    {
        return ($namaHari ? hari($carbon) . $splitterHari : '') . $carbon->day . ' ' . bulan($carbon) . ' ' . $carbon->year . ($jam ? ', ' . zero_prefix($carbon->hour) . ':' . zero_prefix($carbon->minute) : '');
    }

}

if (!function_exists('parse_post')) {
    function parse_post($posts)
    {
        $posts->each(function ($post, $key) {
            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->isi, $image);
            $post->thumbnail = isset($image['src']) ? $image['src'] : 'img/not-available.png';
            preg_match("/(?:\w+(?:\W+|$)){0,50}/", strip_tags($post->isi), $isi);
            $post->summary = $isi[0];
            preg_match("/(?:\w+(?:\W+|$)){0,10}/", strip_tags($post->isi), $singkat);
            $post->brief = $singkat[0] . ' ...';
        });

        return $posts;
    }
}

if (!function_exists('number_to_roman')) {
    function number_to_roman($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}

if (!function_exists('number_to_word')) {
    function number_to_word($number)
    {
        return (new NumberFormatter("id", NumberFormatter::SPELLOUT))->format($number);
    }
}

if (!function_exists('array_to_string')) {
    function arrayToString($array, $splitter = ', ', $lastSplitter = ' and ')
    {
        $string = implode($splitter, $array);
        $string = str_replace($splitter . array_last($array), $lastSplitter . array_last($array), $string);

        return $string;
    }
}

if (!function_exists('boolean_print')) {
    function boolean_print($bool)
    {
        return $bool ? 'Ya' : 'Tidak';
    }
}

if (!function_exists('asset_exists')) {
    function asset_exists($path)
    {
        if (empty($path)){
            return false;
        }

        return file_exists(public_path($path));
    }
}

if (!function_exists('custom')) {
    function custom($key){
        try {
            return Custom::query()
                ->findOrFail($key)
                ->value;
        } catch (ModelNotFoundException $exception) {
            return '';
        }
    }
}

if (!function_exists('fill_empty')) {
    function fill_empty($var, $fill){
        return empty($var) ? $fill : $var;
    }
}