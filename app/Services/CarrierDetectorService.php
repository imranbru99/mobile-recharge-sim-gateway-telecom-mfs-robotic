<?php

namespace App\Services;

class CarrierDetectorService
{
    /**
     * Normalize Bangladeshi phone number to standard 11-digit format (e.g., 017XXXXXXXX).
     */
    public static function normalizeNumber(?string $number): string
    {
        if (!$number) {
            return '';
        }

        // Strip non-digit characters
        $cleaned = preg_replace('/\D/', '', $number);

        // Strip country code 88 if present
        if (str_starts_with($cleaned, '8801')) {
            $cleaned = substr($cleaned, 2);
        }

        return $cleaned;
    }

    /**
     * Validate if the given number is a valid 11-digit Bangladeshi mobile number.
     */
    public static function isValidMobile(string $number): bool
    {
        $normalized = self::normalizeNumber($number);
        return (bool) preg_match('/^01[3-9]\d{8}$/', $normalized);
    }

    /**
     * Detect operator/telco name by phone number prefix.
     */
    public static function detectCarrier(string $number): string
    {
        $normalized = self::normalizeNumber($number);

        if (strlen($normalized) < 3) {
            return 'Unknown';
        }

        $prefix = substr($normalized, 0, 3);

        return match ($prefix) {
            '017', '013' => 'GP',
            '018'        => 'Robi',
            '016'        => 'Airtel',
            '019', '014' => 'Banglalink',
            '015'        => 'Teletalk',
            default      => 'Unknown',
        };
    }

    /**
     * Return carrier metadata including brand name, code, and display color.
     */
    public static function getCarrierInfo(string $carrierOrNumber): array
    {
        $carrier = strlen($carrierOrNumber) >= 11 
            ? self::detectCarrier($carrierOrNumber) 
            : strtoupper(trim($carrierOrNumber));

        $carriers = [
            'GP' => [
                'code' => 'GP',
                'name' => 'Grameenphone',
                'ussd' => '*566#',
                'color' => '#00a3e0',
                'type' => 'Telecom',
                'prefixes' => ['017', '013'],
            ],
            'ROBI' => [
                'code' => 'Robi',
                'name' => 'Robi Axiata',
                'ussd' => '*222#',
                'color' => '#e30613',
                'type' => 'Telecom',
                'prefixes' => ['018'],
            ],
            'AIRTEL' => [
                'code' => 'Airtel',
                'name' => 'Airtel Bangladesh',
                'ussd' => '*778#',
                'color' => '#ea1b25',
                'type' => 'Telecom',
                'prefixes' => ['016'],
            ],
            'BANGLALINK' => [
                'code' => 'Banglalink',
                'name' => 'Banglalink Digital',
                'ussd' => '*124#',
                'color' => '#f26522',
                'type' => 'Telecom',
                'prefixes' => ['019', '014'],
            ],
            'TELETALK' => [
                'code' => 'Teletalk',
                'name' => 'Teletalk Bangladesh',
                'ussd' => '*152#',
                'color' => '#00843d',
                'type' => 'Telecom',
                'prefixes' => ['015'],
            ],
            'BKASH' => [
                'code' => 'bKash',
                'name' => 'bKash Limited',
                'ussd' => '*247#',
                'color' => '#e2136e',
                'type' => 'MFS',
                'prefixes' => [],
            ],
            'NAGAD' => [
                'code' => 'Nagad',
                'name' => 'Nagad (Postal MFS)',
                'ussd' => '*167#',
                'color' => '#f7931e',
                'type' => 'MFS',
                'prefixes' => [],
            ],
            'ROCKET' => [
                'code' => 'Rocket',
                'name' => 'Dutch-Bangla Rocket',
                'ussd' => '*322#',
                'color' => '#8b20bb',
                'type' => 'MFS',
                'prefixes' => [],
            ],
            'UPAY' => [
                'code' => 'Upay',
                'name' => 'UCB Upay',
                'ussd' => '*268#',
                'color' => '#005baa',
                'type' => 'MFS',
                'prefixes' => [],
            ],
        ];

        return $carriers[$carrier] ?? [
            'code' => $carrier,
            'name' => $carrier,
            'ussd' => '',
            'color' => '#64748b',
            'type' => 'General',
            'prefixes' => [],
        ];
    }
}
