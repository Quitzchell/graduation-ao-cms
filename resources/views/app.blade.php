<!DOCTYPE html>
<html lang="{{ app('language') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    @if(!app()->environment('production'))
        <meta name="robots" content="{{\Meta::get('ROBOTS')}}">
    @endif
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="9a175214-6f92-4ffb-8c41-3b550d242b1f" data-blockingmode="auto" data-framework="TCFv2.2" type="text/javascript"></script>
    <script data-cookieconsent="ignore" data-pagespeed-no-defer>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("consent", "default", {
            ad_personalization: "denied",
            ad_storage: "denied",
            ad_user_data: "denied",
            analytics_storage: "denied",
            functionality_storage: "denied",
            personalization_storage: "denied",
            security_storage: "granted",
            wait_for_update: 500,
        });
        gtag("set", "ads_data_redaction", true);
        gtag("set", "url_passthrough", true);
    </script>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TRXZSZN');</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <base href="{!! url('') !!}">
    <style>
        body {
            width: 100vw
        }
    </style>

    @vite('resources/css/app.css')
    @routes
    @viteReactRefresh
    @vite('resources/js/app.jsx')
    @inertiaHead
{{--    @if(config('app.env') === 'staging')--}}
{{--    <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=" async="true"></script>--}}
{{--    @endif--}}
</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRXZSZN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@inertia

</body>
</html>
