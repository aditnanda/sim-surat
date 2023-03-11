<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Hi AM!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        html {
            height: 100%;
        }

        body {
            font-family: "Helvetica Neue", "Luxi Sans", "DejaVu Sans", Tahoma, "Hiragino Sans GB", "Microsoft Yahei", sans-serif;
            background: #79a8ae;
            color: #CFEBE4;
            font-size: 18px;
            line-height: 2;
            letter-spacing: 1.2px;
            margin: 0;
        }

        a {
            color: #ebf7f4;
        }

        .body--ready {
            background: -webkit-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
            background: -moz-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
            background: -o-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
            background: -ms-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
            background: linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
        }

        .text {
            position: fixed;
            bottom: 100px;
            text-align: center;
            width: 100%;
        }

        .canvas {
            margin: 0 auto;
            display: block;
        }

        img#logo {
            width: 128px;
            background-size: cover;
            border-radius: 200px;
            box-shadow: 0px 0px 40px rgba(63, 81, 181, 0.72);
            border: 3px solid #00a0ff;
            opacity: 1;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            transition: all 1.0s;
        }

        #logo:hover {
            box-shadow: 0 0 10px #fff;
            -webkit-box-shadow: 0 0 19px #fff;
            transform: rotate(360deg);
            -ms-transform: rotate(360deg); /* IE 9 */
            -moz-transform: rotate(360deg); /* Firefox */
            -webkit-transform: rotate(360deg); /* Safari 和 Chrome */
            -o-transform: rotate(360deg); /* Opera */
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }

        .cs {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            position: absolute;
            text-align: center;
        }

        .text {
            position: fixed;
            bottom: 80px;
            text-align: center;
            width: 100%;
            font-weight: bold;
        }

        .text-right {
            position: fixed;
            bottom: 50px;
            text-align: right;
            width: 100%;
            font-weight: bold;
        }
    </style>
        @livewireStyles

</head>

<body>
@livewire('secret.am')

@livewireScripts
@stack('scripts')
</body>
</html>
