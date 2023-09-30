@php
    $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    $align = app()->getLocale() == 'ar' ? 'a_right' : 'a_left';
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $subject }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            direction: {{ $dir }};
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        .a_right {
            text-align: right;
        }

        .a_left {
            text-align: left;
        }
    </style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <div style="font-family: 'Cairo', sans-serif;">
        <table style=" margin-bottom: 30px" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" style="background-color: #845EC2">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 0px 10px 0px 10px; background-color: #845EC2">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td bgcolor="#ffffff" align="center" valign="top"
                                style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                <img src="{{ url('assets/images/logo.png') }}" alt="{{ $siteName }}"
                                    style="display: block; border: 0; padding: 25px 0; width: 190px;" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td bgcolor="#ffffff" class="{{ $align }}"
                                style="padding: 20px 30px 20px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">{{ __('lang.welcome') }}, <strong>{{ $username }}.</strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" class="{{ $align }}"
                                style="padding: 0 30px 10px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">{{ __('lang.thanks_registering') }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" class="{{ $align }}"
                                style="padding: 0 30px 10px 30px; color: #666666; font-size: 14px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">{{ __('lang.ex_time_register') }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" class="{{ $align }}"
                                style="padding: 20px 30px 20px 30px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;"><strong>{{ __('lang.code') }}: <span
                                            style="color: #845EC2">{{ $code }}</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" class="{{ $align }}"
                                style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">{{ $siteName }},<br>{{ __('lang.thank_you') }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
