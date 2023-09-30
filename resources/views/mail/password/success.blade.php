<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $subject }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style type="text/css">
        a {
            text-decoration: none;
            -webkit-transition: all .4s ease-in-out;
            -moz-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }
        .textAfterHeading {
            color: #2a2a2a;
            font-size: 14px;
            text-align: center;
            padding: 10px 15px;
            line-height: 23px;
        }
    </style>
</head>
<body style="background-color: #8ab630; height: 100%; margin: 0; padding: 0; width: 100%">
<div style="font-family: 'Cairo', sans-serif;">
    <table style="display: block">
        <tbody style="display: block">
        <tr style="display: block">
            <td style="display: block">
                <table style="width:80%; display: block;margin: auto">
                    <tbody style="display: block;">
                    <tr style="display: block">
                        <td style="display: block">
                            <table style="margin-top: 80px;display: block;">
                                <tbody style="display: block">
                                <tr style="display: block">
                                    <td style="background-color: #f7f7ff;padding: 40px 15px 15px;display: block;">
                                        <a href="{{ url('/') }}" style="display: block;text-align: center" target="_blank">
                                            <img align="center" class="mcnImage" src="{{ asset('images/success.png') }}" width="200">
                                        </a>
                                    </td>
                                </tr>

                                <tr style="display: block">
                                    <td style="background-color: #f7f7ff;padding: 40px 15px;margin-top: -2px;display: block;">
                                        <h1 class="null" style='color: #2a2a2a; font-size: 32px; font-style: normal; font-weight: bold; line-height:125%; letter-spacing: 2px; text-align: center; display: block; margin: 0;padding: 0'>
                                            <span style="text-transform:uppercase">Success</span>
                                        </h1>
                                        <h2 class="null" style='color: #2a2a2a;font-size: 24px; font-style: normal; font-weight: bold; line-height:125%; letter-spacing: 1px; text-align: center; display: block; margin: 0;padding: 0'>
                                            <span style="text-transform:uppercase">Changed password!</span>
                                        </h2>
                                        <p class="textAfterHeading">You are changed your password successfully.</p>
                                    </td>
                                </tr>
                                <tr style="display: block">
                                    <td style="background-color: #f7f7ff;padding: 20px;margin-top: 15px;display: block;">
                                        <p style='margin: 10px 0; padding: 0;color: #2a2a2a;font-size: 12px; line-height: 150%;text-align: left; text-align: left; font-size: 14px; '>
                                            <span style="color: #8ab630; position:relative; top: 4.5px; font-size: 18px; font-weight: bold">*</span> If you did change the password, no further action is required.
                                            <br />
                                            <span style="color: #8ab630; position:relative; top: 4.5px; font-size: 18px; font-weight: bold">*</span> If you did not change your password, protect your account.
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>