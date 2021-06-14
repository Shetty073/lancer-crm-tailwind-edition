<?php

namespace App\Lancer;

class Utilities
{
    public static function getEnquiryStatusStyle($status)
    {
        $enquiryStatusStyle = '';

        switch ($status) {
            case 1:
                $enquiryStatusStyle = 'rounded-full bg-yellow-600 text-white py-1 px-2';
                break;
            case 2:
                $enquiryStatusStyle = 'rounded-full bg-blue-600 text-white py-1 px-2';
                break;
            case 3:
                $enquiryStatusStyle = 'rounded-full bg-gray-600 text-white py-1 px-2';
                break;
            case 4:
                $enquiryStatusStyle = 'rounded-full bg-red-600 text-white py-1 px-2';
                break;

            default:
                $enquiryStatusStyle = 'rounded-full bg-green-600 text-white py-1 px-2';
                break;
        }

        return $enquiryStatusStyle;
    }

    public static function getClientStatus($status)
    {
        $enquiryStatusStyle = '';

        switch ($status) {
            case 1:
                $enquiryStatusStyle = 'Active';
                break;

            default:
                $enquiryStatusStyle = 'Inactive';
                break;
        }

        return $enquiryStatusStyle;
    }

    public static function getClientStatusStyle($status)
    {
        $enquiryStatusStyle = '';

        switch ($status) {
            case 1:
                $enquiryStatusStyle = 'rounded-full bg-green-600 text-white py-1 px-2';
                break;

            default:
                $enquiryStatusStyle = 'rounded-full bg-red-600 text-white py-1 px-2';
                break;
        }

        return $enquiryStatusStyle;
    }
}
