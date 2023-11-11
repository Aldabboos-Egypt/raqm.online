<?php

namespace App\Services;

class WhatsappService
{
    private static $instance;

    public const whatsappInstance = "instance65978";
    public const whatsappToken = "gth7mlhoxqos346l";

    private function __construct()
    {
    }

    /**
     * Returns an instance of the LoginService class.
     * @return LoginService An instance of the LoginService class.
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new WhatsappService();
        }

        return self::$instance;
    }

    /**
     * Sends a verification code to a phone number.
     *
     * @param string $phone The phone number to send the verification code to.
     * @param string $code The verification code.
     * @return Some_Return_Value The result of sending the verification code.
     */
    public function sendVerificationCode($phone, $code, $username = "")
    {
        $msg = "";
        $msg .= "*" . env('APP_NAME') . " 🔎*\n\n";
        $msg .= "مرحبا بك يا " . $username . " 🥰\n";
        $msg .= "تم تسجيل حسابك في " . env('APP_NAME') . " 🥳\n";
        $msg .= "شكرا لتسجيلك معانا \n";
        $msg .= "كود التفعيل هو : " . $code . "\n";
        $msg .= "قم بتفعيل حسابك من الرابط التالى 👇\n\n";
        $msg .= toHttps(env('FRONT_URL')) . "/verify?phone=" . $phone . "&code=" . $code . "\n";

        $image = "https://backend.raqm.online/assets/imgs/whastapp.png";
        // $image = asset('assets/images/logo.png');
        return $this->sendMsg($phone, $msg, $image);
    }

    /**
     * Sends a message to a recipient.
     *
     * @param datatype $to the recipient of the message
     * @param datatype $msg the message to be sent
     * @return boolean
     */
    public function sendMsg($to, $msg, $image = null)
    {
        $params = array(
            'token' => self::whatsappToken,
            'to' => $to,
            'image' => $image,
            'caption' => $msg,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/" . self::whatsappInstance . "/messages/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);
        return optional($response)->sent == true ? true : false;
    }

    /**
     * Sends a message to a recipient.
     *
     * @param datatype $to the recipient of the message
     * @param datatype $msg the message to be sent
     * @return boolean
     */
    public function checkWhatsapp($number)
    {
        $params = array(
            'token' => self::whatsappToken,
            'chatId' => $number,
            'nocache' => '',
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/" . self::whatsappInstance . "/contacts/check?" . http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $response = json_decode($response);
        return optional($response)->status == 'valid' ? true : false;
    }

}
