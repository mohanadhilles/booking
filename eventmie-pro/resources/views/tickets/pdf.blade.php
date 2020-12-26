<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<style>
    * {
        padding: 0;
        margin: 0; 
        font-family: 'DejaVu Sans', sans-serif;
    }
    body {
        margin: 0 auto !important;
        padding: 0 !important;
        height: 100% !important;
        width: 100% !important;
        font-size: 14px;
        font-family: 'DejaVu Sans', sans-serif;
    }
    table {
        width: 95%;
        padding: 1px;
        margin: 0 auto !important;
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        table-layout: fixed !important;
    }
    table table table {
        table-layout: auto;
    }
    table td {
        padding: 5px;
        font-size: 14px;
    }
    .center {
        text-align: center;
    }
    .text-left {
        text-align: left;
    }
    .text-right {
        text-align: right;
    }
    [dir=rtl] .text-right {
        text-align: left;
    }
    [dir=rtl] .text-left {
        text-align: right;
    }
    p {
        font-size: 18px;
        display: block;
    }
    .title-bar {
        padding: 0 !important;
        border-bottom: 2px solid #2b2b2b;
    }
    .title-bar .s-heading {
        color: #797979;
        font-size: 14px;
        margin: 0 0 5px 0;
    }
    .title-bar .m-heading {
        color: #3c3c3c;
        font-size: 16px;
        margin: 0;
    }
</style>
</head>
<body {!! is_rtl() ? 'dir="rtl"' : '' !!}>
    <!-- when testing  -->
    {{-- <div style="max-width: 680px;margin: 0 auto;"> --}}
    <!-- when generating  -->
    <div>

        <div>
            <table>
                <tr>
                    <td class="title-bar center"> 
                        <table>
                            <tr>
                                <td style="padding: 10px;width: 40%;" class="text-right">
                                    <img src="{{$img_path.'/storage/'.setting('site.logo')}}" style="width: 64px;">
                                </td>
                                <td style="padding: 10px;width: 60%;" class="text-left">
                                    <p class="m-heading">{{ (setting('site.site_name') ? setting('site.site_name') : config('app.name')) }}</p>
                                    <p class="s-heading">{{ setting('site.site_slogan') }}</p>
                                    <p class="s-heading">{{$booking['customer_id']}}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 1. Event details -->
        <div>
            <table>
                <tr>
                    <td style="padding: 5% 10px 10px 10px;width: 30%;" class="text-right">
                        <img style="width: 100%;border-radius: 12px;" src="{{$img_path.'/storage/'.$event->thumbnail}}">
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <table>
                <tr>
                    <td><hr style="border: 1px solid #000;"></td>
                </tr>
            </table>
        </div>
        
        <!-- 2. Booking details -->
        <br>
        <div>
            <table>
                <tr>
                    <td class="center">
                        <p><span style="font-size: 24px;font-weight: 600;">#</span> {{$booking['order_number']}}</p>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 2. QrCode -->
        <div>
            <table>
                <tr>
                    <td style="text-align: center;padding-top: 10%;">
                        @php $qrcode = $booking['customer_id'].'/'.$booking['id'].'-'.$booking['order_number'].'.png'; @endphp
                        <img src="{{$img_path.'/storage/qrcodes/'.$qrcode}}" style="width: 70%;">
                    </td>
                </tr>
            </table>
        </div>

    </div>


</body>
</html>