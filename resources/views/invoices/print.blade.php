<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: 'Verdana', sans-serif;
            font-size: 14px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        .invoice-header,
        .invoice-header-text {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header-text h1{
            font-size: 20px;
        }
        .header-info{
            margin-bottom: 50px;
        }
        .header-info table thead tr th{
            border-bottom: 1px solid #000000;
            background-color: #c1c1c1;
            padding: 5px 10px;
        }
        .header-info table thead tr th:first-child{
            border-right: 1px solid #000000;
        }
        .header-info table tbody tr td.spacer{
            width: 1%;
            padding: 0px;
        }
        .header-info table tbody tr td{
            padding: 5px 10px;
        }
        .invoice-details {
            margin-bottom: 40px;
        }
        .invoice-details table th,
        .invoice-details table td {
            border: 1px solid #000000;
            padding: 5px 10px;
            text-align: left;
        }
        .invoice-details table td{
            font-size: 12px;
        }
        .invoice-details table thead tr th:first-child{
            text-align: left;
        }
        .invoice-details table thead tr th:first-child{
            width: 2%;
        }
        .invoice-details table thead tr th:nth-child(2){
            width: 48%;
        }
        .invoice-details table thead tr th:nth-child(3),
        .invoice-details table thead tr th:last-child{
            width: 25%;
        }
        .invoice-details table tbody tr td{
            vertical-align: top;
        }
        .invoice-details table tbody tr td:nth-child(2){
            word-break:break-all;
        }
        .invoice-details table tbody tr{
            border-right: 1px solid #000;
            border-left: 1px solid #000;
        }
        .invoice-details table tbody tr:last-child{
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            border-left: 1px solid #000;
        }
        .invoice-details table tbody tr td{
            border-bottom: none;
            border-right: none;
            border-top: none;
        }
        .invoice-info-details h3{
            margin-bottom: 5px;
            padding-bottom: 5px;
            border-bottom: 1px solid #c1c1c1;
            display: inline-block;
            width: 50%;
        }
        .invoice-info-details .info-details tbody tr td{
            font-size: 12px;
        }
        .invoice-info-details .info-details tbody tr td:first-child{
            width: 10%;
        }
        .invoice-info-details .info-details tbody tr td:nth-child(2){
            width: 2%;
        }
        .footer-box{
            position: relative;
        }
        .footer-box table{
            width: 100%;
        }
        .footer-box .authorized{
            position: absolute;
            top: 20px;
            right: 0px;
        }
        .footer-box .authorized .stamp{
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="invoice-header">
            <!-- <img src="{{ public_path('img/logo-ebamas.png') }}" alt="logo"/> -->
        </div>
        <div class="invoice-header-text">
            <h1>INVOICE</h1>
        </div>

        <div class="header-info">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th colspan="3" style="text-align: left; width: 50%;"><strong>Customer</strong></th>
                        <th colspan="3" style="text-align: left; width: 50%;"><strong>Misc</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Company</td>
                        <td class="spacer">:</td>
                        <td>{{ $invoice->nama_perusahaan_tujuan }}</td>
                        <td>Date</td>
                        <td class="spacer">:</td>
                        <td>{{ $invoice->tanggal_penerbitan }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td class="spacer">:</td>
                        <td>{{ $invoice->alamat_perusahaan }}</td>
                        <td>Invoice No</td>
                        <td class="spacer">:</td>
                        <td>{{ $invoice->nomor_invoice }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td class="spacer">:</td>
                        <td>{{ $invoice->no_telepon }}</td>
                        <td>Order No</td>
                        <td class="spacer">:</td>
                        <td>{{ $invoice->order_no }}</td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <div class="invoice-details">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->invoiceItems as $key => $invoice_item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $invoice_item->deskripsi }}</td>
                        <td>Rp {{ number_format($invoice_item->unit_price, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($invoice_item->amount, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right; border: none; font-size: 14px;">Subtotal</td>
                        <td style="font-size: 14px;">Rp {{ number_format($invoice->total_bayar, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: left; border: none; font-style: italic;">Says: Seratus Ribu Rupiah</td>
                        <td style="text-align: right; border: none; font-size: 14px; font-weight:bold;">Total</td>
                        <td style="font-size: 14px; font-weight:bold;">Rp. {{ number_format($invoice->total_bayar, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="footer-box">
            <div class="invoice-info-details">
                <h3>Payments</h3>
                <table class="info-details">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Comment</td>
                            <td>:</td>
                            <td>Remitence No </td>
                        <tr>
                        <tr>
                            <td>Company</td>
                            <td>:</td>
                            <td>PT EKA BERLIAN MAKMUR SENTOSA</td>
                        </tr>
                        <tr>
                            <td>Bank</td>
                            <td>:</td>
                            <td>BCA (Bank Central Asia)</td>
                        </tr>
                        <tr>
                            <td>Account No</td>
                            <td>:</td>
                            <td>7641555596</td>
                        </tr>
                        <tr>
                            <td>Over Due</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="authorized">
                <div class="title">Authorized,</div>
                <div class="company">PT Eka Berlian Makmur Sentosa</div>
                <div class="stamp">disini stample</div>
                <div class="sign">PT EBAMAS</div>
            </div>
        </div>
    </div>

   
</body>
</html>
