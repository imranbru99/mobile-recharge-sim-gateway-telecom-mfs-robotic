<?php

namespace App\Services;

class SmsParserService
{
    /**
     * Parse any incoming SMS text and return structured intelligence.
     */
    public static function parse(string $text, ?string $sender = null): array
    {
        $text = trim($text);
        $result = [
            'provider'       => 'Unknown',
            'type'           => 'general',
            'trx_id'         => null,
            'amount'         => null,
            'fee'            => 0.0,
            'balance'        => null,
            'sender_number'  => null,
            'receiver_number'=> null,
            'otp'            => null,
            'timestamp_text' => null,
            'raw_text'       => $text,
            'is_financial'   => false,
        ];

        // 1. Detect OTP
        $otp = self::extractOtp($text);
        if ($otp) {
            $result['otp'] = $otp;
            $result['type'] = 'otp';
        }

        $senderUpper = strtoupper($sender ?? '');
        $textUpper   = strtoupper($text);

        // 2. bKash Detection & Parsing
        if (str_contains($senderUpper, 'BKASH') || str_contains($textUpper, 'BKASH') || preg_match('/TrxID\s+([A-Z0-9]+)/i', $text)) {
            $result['provider'] = 'bKash';
            $result['is_financial'] = true;

            // Extract TrxID
            if (preg_match('/TrxID\s+([A-Z0-9]{8,15})/i', $text, $matches)) {
                $result['trx_id'] = $matches[1];
            }

            // Extract Amount (e.g. Tk 500.00 or Tk 500 or Tk. 500)
            if (preg_match('/(?:Tk|Tk\.|BDT)\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['amount'] = (float) str_replace(',', '', $matches[1]);
            }

            // Extract Balance
            if (preg_match('/(?:Balance|Bal|Bal:)\s*(?:Tk|Tk\.|BDT)?\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['balance'] = (float) str_replace(',', '', $matches[1]);
            }

            // Extract Fee
            if (preg_match('/Fee\s*(?:Tk|Tk\.|BDT)?\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['fee'] = (float) str_replace(',', '', $matches[1]);
            }

            // Determine Transaction Type
            if (stripos($text, 'Cash In') !== false) {
                $result['type'] = 'cash_in';
            } elseif (stripos($text, 'Cash Out') !== false) {
                $result['type'] = 'cash_out';
            } elseif (stripos($text, 'Send Money') !== false || stripos($text, 'received') !== false) {
                $result['type'] = 'send_money';
            } elseif (stripos($text, 'Payment') !== false) {
                $result['type'] = 'payment';
            } elseif (stripos($text, 'Recharge') !== false) {
                $result['type'] = 'recharge';
            }

            // Extract Target/Sender phone number
            if (preg_match('/(?:from|to|from:)\s*(01[3-9]\d{8})/i', $text, $matches)) {
                $result['sender_number'] = $matches[1];
            }

            return $result;
        }

        // 3. Nagad Detection & Parsing
        if (str_contains($senderUpper, 'NAGAD') || str_contains($textUpper, 'NAGAD') || preg_match('/TxnID:\s*([A-Z0-9]+)/i', $text)) {
            $result['provider'] = 'Nagad';
            $result['is_financial'] = true;

            // Extract TxnID
            if (preg_match('/(?:TxnID|Txn ID|TrxID):\s*([A-Z0-9]{6,15})/i', $text, $matches)) {
                $result['trx_id'] = $matches[1];
            }

            // Amount (e.g. Amount: Tk 2,000.00 or Tk 2,000.00 or Cash In Tk 2,000.00)
            if (preg_match('/(?:Amount|Tk|BDT)[:\s]+(?:Tk|BDT)?\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['amount'] = (float) str_replace(',', '', $matches[1]);
            }

            // Balance
            if (preg_match('/(?:Balance|Bal)[:\s]+(?:Tk|BDT)?\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['balance'] = (float) str_replace(',', '', $matches[1]);
            }

            // Sender/receiver phone number
            if (preg_match('/(?:from|to)[:\s]+(01[3-9]\d{8})/i', $text, $matches)) {
                $result['sender_number'] = $matches[1];
            }

            // Type
            if (stripos($text, 'Cash In') !== false) {
                $result['type'] = 'cash_in';
            } elseif (stripos($text, 'Cash Out') !== false) {
                $result['type'] = 'cash_out';
            } elseif (stripos($text, 'Received') !== false || stripos($text, 'Send Money') !== false) {
                $result['type'] = 'send_money';
            } elseif (stripos($text, 'Recharge') !== false) {
                $result['type'] = 'recharge';
            }

            return $result;
        }

        // 4. Rocket Detection & Parsing
        if (str_contains($senderUpper, 'ROCKET') || str_contains($senderUpper, '16216') || str_contains($textUpper, 'ROCKET')) {
            $result['provider'] = 'Rocket';
            $result['is_financial'] = true;

            if (preg_match('/TxnId:\s*([A-Z0-9]{6,15})/i', $text, $matches)) {
                $result['trx_id'] = $matches[1];
            }

            if (preg_match('/(?:Tk|BDT)\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['amount'] = (float) str_replace(',', '', $matches[1]);
            }

            if (preg_match('/(?:Balance|Bal)\s*(?:is)?\s*(?:Tk|BDT)?\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['balance'] = (float) str_replace(',', '', $matches[1]);
            }

            $result['type'] = stripos($text, 'Cash In') !== false ? 'cash_in' : 'recharge';
            return $result;
        }

        // 5. Flexiload / Telecom Recharge (GP, Robi, Banglalink, Teletalk, Airtel)
        if (stripos($text, 'flexiload') !== false || stripos($text, 'recharge successful') !== false || stripos($text, 'easyload') !== false) {
            $result['is_financial'] = true;
            $result['type'] = 'recharge';

            if (stripos($text, 'gp') !== false || stripos($text, 'grameenphone') !== false) {
                $result['provider'] = 'GP';
            } elseif (stripos($text, 'robi') !== false) {
                $result['provider'] = 'Robi';
            } elseif (stripos($text, 'airtel') !== false) {
                $result['provider'] = 'Airtel';
            } elseif (stripos($text, 'banglalink') !== false) {
                $result['provider'] = 'Banglalink';
            } elseif (stripos($text, 'teletalk') !== false) {
                $result['provider'] = 'Teletalk';
            } else {
                $result['provider'] = 'Telecom';
            }

            // Extract TrxID
            if (preg_match('/(?:TrxID|TxnID|TxID|Ref|Txn No)[\s:]+([A-Z0-9]+)/i', $text, $matches)) {
                $result['trx_id'] = $matches[1];
            }

            // Extract Amount
            if (preg_match('/(?:Tk|Tk\.|BDT)\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['amount'] = (float) str_replace(',', '', $matches[1]);
            }

            // Extract Balance
            if (preg_match('/(?:Balance|Bal)[:\s]+(?:Tk|BDT)?\s*([\d,]+(?:\.\d{2})?)/i', $text, $matches)) {
                $result['balance'] = (float) str_replace(',', '', $matches[1]);
            }

            // Extract customer number
            if (preg_match('/(?:to|for|number)[\s:]+(01[3-9]\d{8})/i', $text, $matches)) {
                $result['receiver_number'] = $matches[1];
            }

            return $result;
        }

        return $result;
    }

    /**
     * Extract OTP verification code from text.
     */
    public static function extractOtp(string $text): ?string
    {
        // Common OTP formats: "is 123456", "OTP: 1234", "code: 5678", "verification code is 432109"
        $patterns = [
            '/(?:verification code|security code|otp|code|pin|password)[^0-9]{1,15}(\b\d{4,8}\b)/i',
            '/\b(\d{4,6})\b\s*(?:is your verification|is your OTP|is your code|is your secret code)/i',
            '/OTP\s*[:=\-]\s*(\d{4,8})/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }
}
