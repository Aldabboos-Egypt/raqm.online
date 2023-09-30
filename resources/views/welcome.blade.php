<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css"> -->
    <style>
        @charset "UTF-8";

        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-black: #000;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #e9ecef;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-primary-rgb: 13, 110, 253;
            --bs-secondary-rgb: 108, 117, 125;
            --bs-success-rgb: 25, 135, 84;
            --bs-info-rgb: 13, 202, 240;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 220, 53, 69;
            --bs-light-rgb: 248, 249, 250;
            --bs-dark-rgb: 33, 37, 41;
            --bs-primary-text-emphasis: #052c65;
            --bs-secondary-text-emphasis: #2b2f32;
            --bs-success-text-emphasis: #0a3622;
            --bs-info-text-emphasis: #055160;
            --bs-warning-text-emphasis: #664d03;
            --bs-danger-text-emphasis: #58151c;
            --bs-light-text-emphasis: #495057;
            --bs-dark-text-emphasis: #495057;
            --bs-primary-bg-subtle: #cfe2ff;
            --bs-secondary-bg-subtle: #e2e3e5;
            --bs-success-bg-subtle: #d1e7dd;
            --bs-info-bg-subtle: #cff4fc;
            --bs-warning-bg-subtle: #fff3cd;
            --bs-danger-bg-subtle: #f8d7da;
            --bs-light-bg-subtle: #fcfcfd;
            --bs-dark-bg-subtle: #ced4da;
            --bs-primary-border-subtle: #9ec5fe;
            --bs-secondary-border-subtle: #c4c8cb;
            --bs-success-border-subtle: #a3cfbb;
            --bs-info-border-subtle: #9eeaf9;
            --bs-warning-border-subtle: #ffe69c;
            --bs-danger-border-subtle: #f1aeb5;
            --bs-light-border-subtle: #e9ecef;
            --bs-dark-border-subtle: #adb5bd;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #212529;
            --bs-body-color-rgb: 33, 37, 41;
            --bs-body-bg: #fff;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-emphasis-color: #000;
            --bs-emphasis-color-rgb: 0, 0, 0;
            --bs-secondary-color: rgba(33, 37, 41, 0.75);
            --bs-secondary-color-rgb: 33, 37, 41;
            --bs-secondary-bg: #e9ecef;
            --bs-secondary-bg-rgb: 233, 236, 239;
            --bs-tertiary-color: rgba(33, 37, 41, 0.5);
            --bs-tertiary-color-rgb: 33, 37, 41;
            --bs-tertiary-bg: #f8f9fa;
            --bs-tertiary-bg-rgb: 248, 249, 250;
            --bs-heading-color: inherit;
            --bs-link-color: #0d6efd;
            --bs-link-color-rgb: 13, 110, 253;
            --bs-link-decoration: underline;
            --bs-link-hover-color: #0a58ca;
            --bs-link-hover-color-rgb: 10, 88, 202;
            --bs-code-color: #d63384;
            --bs-highlight-bg: #fff3cd;
            --bs-border-width: 1px;
            --bs-border-style: solid;
            --bs-border-color: #dee2e6;
            --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
            --bs-border-radius: 0.375rem;
            --bs-border-radius-sm: 0.25rem;
            --bs-border-radius-lg: 0.5rem;
            --bs-border-radius-xl: 1rem;
            --bs-border-radius-xxl: 2rem;
            --bs-border-radius-2xl: var(--bs-border-radius-xxl);
            --bs-border-radius-pill: 50rem;
            --bs-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --bs-box-shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --bs-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
            --bs-box-shadow-inset: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            --bs-focus-ring-width: 0.25rem;
            --bs-focus-ring-opacity: 0.25;
            --bs-focus-ring-color: rgba(13, 110, 253, 0.25);
            --bs-form-valid-color: #198754;
            --bs-form-valid-border-color: #198754;
            --bs-form-invalid-color: #dc3545;
            --bs-form-invalid-border-color: #dc3545
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box
        }

        @media (prefers-reduced-motion:no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent
        }

        :root {
            --bs-breakpoint-xs: 0;
            --bs-breakpoint-sm: 576px;
            --bs-breakpoint-md: 768px;
            --bs-breakpoint-lg: 992px;
            --bs-breakpoint-xl: 1200px;
            --bs-breakpoint-xxl: 1400px
        }
    </style>
    <link rel="stylesheet" class="locale-link" href="/assets/css/bootstrap.rtl.min.css" media="print"
        onload="this.media='all'"><noscript>
        <link rel="stylesheet" href="/assets/css/bootstrap.rtl.min.css">
    </noscript>
    <style>
        html {
            box-sizing: border-box
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit
        }

        html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        html,
        body {
            font-family: Verdana, sans-serif;
            font-size: 15px;
            line-height: 1.5
        }

        html {
            overflow-x: hidden
        }

        :disabled * {
            pointer-events: none
        }
    </style>
    <link rel="stylesheet" href="/assets/css/w3.css" media="print" onload="this.media='all'"><noscript>
        <link rel="stylesheet" href="/assets/css/w3.css">
    </noscript>
    <style>
        @-webkit-keyframes iziT-revealIn {
            0% {
                opacity: 0;
                -webkit-transform: scale3d(0.3, 0.3, 1)
            }

            100% {
                opacity: 1
            }
        }

        @-webkit-keyframes iziT-slideIn {
            0% {
                opacity: 0;
                -webkit-transform: translateX(50px)
            }

            100% {
                opacity: 1;
                -webkit-transform: translateX(0)
            }
        }

        @-webkit-keyframes iziT-bounceInLeft {
            0% {
                opacity: 0;
                -webkit-transform: translateX(280px)
            }

            50% {
                opacity: 1;
                -webkit-transform: translateX(-20px)
            }

            70% {
                -webkit-transform: translateX(10px)
            }

            100% {
                -webkit-transform: translateX(0)
            }
        }

        @-webkit-keyframes iziT-bounceInRight {
            0% {
                opacity: 0;
                -webkit-transform: translateX(-280px)
            }

            50% {
                opacity: 1;
                -webkit-transform: translateX(20px)
            }

            70% {
                -webkit-transform: translateX(-10px)
            }

            100% {
                -webkit-transform: translateX(0)
            }
        }

        @-webkit-keyframes iziT-bounceInDown {
            0% {
                opacity: 0;
                -webkit-transform: translateY(-200px)
            }

            50% {
                opacity: 1;
                -webkit-transform: translateY(10px)
            }

            70% {
                -webkit-transform: translateY(-5px)
            }

            100% {
                -webkit-transform: translateY(0)
            }
        }

        @-webkit-keyframes iziT-bounceInUp {
            0% {
                opacity: 0;
                -webkit-transform: translateY(200px)
            }

            50% {
                opacity: 1;
                -webkit-transform: translateY(-10px)
            }

            70% {
                -webkit-transform: translateY(5px)
            }

            100% {
                -webkit-transform: translateY(0)
            }
        }

        @-webkit-keyframes iziT-fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @-webkit-keyframes iziT-fadeInUp {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-fadeInDown {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-fadeInLeft {
            from {
                opacity: 0;
                -webkit-transform: translate3d(300px, 0, 0);
                transform: translate3d(300px, 0, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-fadeInRight {
            from {
                opacity: 0;
                -webkit-transform: translate3d(-300px, 0, 0);
                transform: translate3d(-300px, 0, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-flipInX {
            from {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                opacity: 0
            }

            40% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -20deg)
            }

            60% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                opacity: 1
            }

            80% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -5deg)
            }

            to {
                -webkit-transform: perspective(400px);
                transform: perspective(400px)
            }
        }

        @-webkit-keyframes iziT-fadeOut {
            from {
                opacity: 1
            }

            to {
                opacity: 0
            }
        }

        @-webkit-keyframes iziT-fadeOutDown {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
        }

        @-webkit-keyframes iziT-fadeOutUp {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0)
            }
        }

        @-webkit-keyframes iziT-fadeOutLeft {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(-200px, 0, 0);
                transform: translate3d(-200px, 0, 0)
            }
        }

        @-webkit-keyframes iziT-fadeOutRight {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(200px, 0, 0);
                transform: translate3d(200px, 0, 0)
            }
        }

        @-webkit-keyframes iziT-flipOutX {
            from {
                -webkit-transform: perspective(400px);
                transform: perspective(400px)
            }

            30% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                opacity: 1
            }

            to {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                opacity: 0
            }
        }

        @-webkit-keyframes iziT-revealIn {
            0% {
                opacity: 0;
                transform: scale3d(0.3, 0.3, 1)
            }

            100% {
                opacity: 1
            }
        }

        @-webkit-keyframes iziT-slideIn {
            0% {
                opacity: 0;
                transform: translateX(50px)
            }

            100% {
                opacity: 1;
                transform: translateX(0)
            }
        }

        @-webkit-keyframes iziT-bounceInLeft {
            0% {
                opacity: 0;
                transform: translateX(280px)
            }

            50% {
                opacity: 1;
                transform: translateX(-20px)
            }

            70% {
                transform: translateX(10px)
            }

            100% {
                transform: translateX(0)
            }
        }

        @-webkit-keyframes iziT-bounceInRight {
            0% {
                opacity: 0;
                transform: translateX(-280px)
            }

            50% {
                opacity: 1;
                transform: translateX(20px)
            }

            70% {
                transform: translateX(-10px)
            }

            100% {
                transform: translateX(0)
            }
        }

        @-webkit-keyframes iziT-bounceInDown {
            0% {
                opacity: 0;
                transform: translateY(-200px)
            }

            50% {
                opacity: 1;
                transform: translateY(10px)
            }

            70% {
                transform: translateY(-5px)
            }

            100% {
                transform: translateY(0)
            }
        }

        @-webkit-keyframes iziT-bounceInUp {
            0% {
                opacity: 0;
                transform: translateY(200px)
            }

            50% {
                opacity: 1;
                transform: translateY(-10px)
            }

            70% {
                transform: translateY(5px)
            }

            100% {
                transform: translateY(0)
            }
        }

        @-webkit-keyframes iziT-fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @-webkit-keyframes iziT-fadeInUp {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-fadeInDown {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-fadeInLeft {
            from {
                opacity: 0;
                -webkit-transform: translate3d(300px, 0, 0);
                transform: translate3d(300px, 0, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-fadeInRight {
            from {
                opacity: 0;
                -webkit-transform: translate3d(-300px, 0, 0);
                transform: translate3d(-300px, 0, 0)
            }

            to {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @-webkit-keyframes iziT-flipInX {
            from {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                opacity: 0
            }

            40% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -20deg)
            }

            60% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                opacity: 1
            }

            80% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -5deg)
            }

            to {
                -webkit-transform: perspective(400px);
                transform: perspective(400px)
            }
        }

        @-webkit-keyframes iziT-fadeOut {
            from {
                opacity: 1
            }

            to {
                opacity: 0
            }
        }

        @-webkit-keyframes iziT-fadeOutDown {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
        }

        @-webkit-keyframes iziT-fadeOutUp {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0)
            }
        }

        @-webkit-keyframes iziT-fadeOutLeft {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(-200px, 0, 0);
                transform: translate3d(-200px, 0, 0)
            }
        }

        @-webkit-keyframes iziT-fadeOutRight {
            from {
                opacity: 1
            }

            to {
                opacity: 0;
                -webkit-transform: translate3d(200px, 0, 0);
                transform: translate3d(200px, 0, 0)
            }
        }

        @-webkit-keyframes iziT-flipOutX {
            from {
                -webkit-transform: perspective(400px);
                transform: perspective(400px)
            }

            30% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                opacity: 1
            }

            to {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                opacity: 0
            }
        }
    </style>
    <link rel="stylesheet" href="/assets/css/iziToast.css" media="print" onload="this.media='all'"><noscript>
        <link rel="stylesheet" href="/assets/css/iziToast.css">
    </noscript>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style type="text/css">
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fCRc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fABc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fCBc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fBxc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fCxc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fChc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fBBc4AMP6lQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu72xKKTU1Kvnz.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu5mxKKTU1Kvnz.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7mxKKTU1Kvnz.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4WxKKTU1Kvnz.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7WxKKTU1Kvnz.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7GxKKTU1Kvnz.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fCRc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fABc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fCBc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBxc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fCxc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fChc4AMP6lbBP.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBBc4AMP6lQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: 'Material Icons';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/materialicons/v140/flUhRq6tzZclQEJ-Vdg-IuiaDsNcIhQ8tQ.woff2) format('woff2');
        }

        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
    </style>
    <link rel="manifest" href="manifest.webmanifest">
    <meta name="theme-color" content="#1976d2">
    <style>
        @import"https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap";
        @import"https://fonts.googleapis.com/css2?family=Cairo&display=swap";

        .mat-typography {
            font: 400 14px/20px Roboto, Helvetica Neue, sans-serif;
            letter-spacing: normal
        }

        * {
            font-family: Montserrat, Cairo
        }

        body,
        html {
            height: 100vh;
            background: #FFF
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            font-family: Roboto, Helvetica Neue, sans-serif
        }
    </style>
    <link rel="stylesheet" href="styles.d39c64834edc4023.css" media="print" onload="this.media='all'"><noscript>
        <link rel="stylesheet" href="styles.d39c64834edc4023.css">
    </noscript>
</head>

<body class="mat-typography rtl">
    <app-root></app-root>
    <script async="" defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/sharer.js"></script>
    <script src="/assets/js/lzutf8.js"></script>
    <script src="/assets/js/iziToast.min.js"></script>

    <script>
        document.$ = $;
        document.LZUTF8 = LZUTF8;
        document.iziToast = iziToast;
        document.FB = FB;
        document.appToken = '{{ env('JWT_SECRET') }}';
        window.fbAsyncInit = function() {
            try {
                FB.init({
                    appId: '999267064748599',
                    cookie: true,
                    xfbml: true,
                    version: 'v18.0'
                });
            } catch (e) {
                console.error('Error initializing Facebook SDK:', e);
            }
        };
    </script>
    <noscript>Please enable JavaScript to continue using this application.</noscript>
    <script src="runtime.448cc152f95de220.js" type="module"></script>
    <script src="polyfills.07455aa297848b88.js" type="module"></script>
    <script src="scripts.b93b966ca128afba.js" defer></script>
    <script src="main.978f7c01f6835d77.js" type="module"></script>

</body>

</html>
