<?php

namespace App\Lancer;

class Utilities
{
    public static function getEnquiryStatusStyle($status)
    {
        $enquiryStatusStyle = '';

        switch ($status) {
            case 1:
                $enquiryStatusStyle = 'px-1 uppercase text-xs font-bold text-white rounded bg-yellow-500';
                break;
            case 2:
                $enquiryStatusStyle = 'px-1 uppercase text-xs font-bold text-white rounded bg-blue-500';
                break;
            case 3:
                $enquiryStatusStyle = 'px-1 uppercase text-xs font-bold text-white rounded bg-gray-500';
                break;
            case 4:
                $enquiryStatusStyle = 'px-1 uppercase text-xs font-bold text-white rounded bg-red-500';
                break;

            default:
                $enquiryStatusStyle = 'px-1 uppercase text-xs font-bold text-white rounded bg-green-500';
                break;
        }

        return $enquiryStatusStyle;
    }
}
