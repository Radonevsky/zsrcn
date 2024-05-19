<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.svg') }}">
    <title>Document</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app" ref='scrollContainer' >
        <App></App>
    </div>
</body>
<style> #js-show-iframe-wrapper{background:var(--pos-banner-fluid-6__background)}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2{width:100%;min-height:52px;background:#fff;color:#0b1f33;font-size:16px;font-family:LatoWeb,sans-serif;font-weight:400;padding:0;line-height:1.2}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:active,#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:focus,#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:hover{background:#e4ecfd}#js-show-iframe-wrapper .bf-6{position:relative;display:grid;grid-template-columns:var(--pos-banner-fluid-6__grid-template-columns);grid-template-rows:var(--pos-banner-fluid-6__grid-template-rows);width:100%;max-width:var(--pos-banner-fluid-6__max-width);box-sizing:border-box;grid-auto-flow:row dense}#js-show-iframe-wrapper .bf-6__decor{background:var(--pos-banner-fluid-6__bg-url) var(--pos-banner-fluid-6__bg-url-position) no-repeat;background-size:var(--pos-banner-fluid-6__bg-size);background-color:#fffaf6;position:relative}#js-show-iframe-wrapper .bf-6__content{display:flex;flex-direction:column;padding:var(--pos-banner-fluid-6__content-padding);grid-row:var(--pos-banner-fluid-6__content-grid-row);justify-content:center}#js-show-iframe-wrapper .bf-6__text{margin:var(--pos-banner-fluid-6__text-margin);font-size:var(--pos-banner-fluid-6__text-font-size);line-height:1.4;font-family:LatoWeb,sans-serif;font-weight:700;color:#0b1f33}#js-show-iframe-wrapper .bf-6__bottom-wrap{display:flex;flex-direction:row;align-items:center}#js-show-iframe-wrapper .bf-6__logo-wrap{position:absolute;top:var(--pos-banner-fluid-6__logo-wrap-top);right:var(--pos-banner-fluid-6__logo-wrap-right)}#js-show-iframe-wrapper .bf-6__logo{width:var(--pos-banner-fluid-6__logo-width);margin-left:1px}#js-show-iframe-wrapper .bf-6__slogan{font-family:LatoWeb,sans-serif;font-weight:700;font-size:var(--pos-banner-fluid-6__slogan-font-size);line-height:1.2;color:#005ca9}#js-show-iframe-wrapper .bf-6__btn-wrap{width:100%;max-width:var(--pos-banner-fluid-6__button-wrap-max-width)} </style >
</html>
