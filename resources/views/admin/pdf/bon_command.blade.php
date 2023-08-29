<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <style>
        .page-break {
            page-break-after: always;
        }

        .color {
            background-color: red
        }

        .center {
            text-align: center;
            margin-top: 100px
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 2.4cm;
            background-color: #74c7e7;
            color: rgb(0, 0, 0);
            text-align: center;
        }
    </style>
</head>

<body>
    @php
        $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date->delivery_date)->subDay();
        $previousDay = $carbonDate->format('Y-m-d');
        $curent_product = '';
        $count = 0;
    @endphp
    @foreach ($categories as $item)
        @if ($item === 'Fruits et Légumes')
            @foreach (\App\Models\Order::where('category', 'Fruits et Légumes')->get()->unique('subCategory') as $item)
                <table style="width:100%">
                    <tr>
                        <td>
                            <img style="margin-top: 50px"
                                src="https://veryfrais.com/public/storage/restaurant/2022-09-23-632d303dc15f3.png"
                                width="160px" height="75px" /><br>
                            <b>Phone :</b> 0600038001 <br>
                            <b>email :</b> support@veryfrais.com <br>
                            <b>adresse :</b> ANGLE BD ABDELMOUMEN <br> & RUE SOUMAYA RES SHEHRAZADE <br> 3 ETG 4 N 20
                            Casablanca<br><br>
                            <b>ICE :</b>003068414000037 <br>
                            <br><br><br><br><br><br><br><br>
                        </td>
                        <td>
                            <h1>Bon de commande </h1>
                            <b>Commande N° : </b> {{ $numero_command }} - {{ date('Y') }} <br>
                            <b>Date</b> : {{ $previousDay }} <br><br>
                            <b>Fournisseur : </b> nom <br>
                            <b>Email : </b> email@email.com <br>
                            <b>Adresse : </b> adresse here <br>
                            <b>Telephone : </b> 0600000000 <br>
                        </td>
                    </tr>
                </table>
                <h2 style="text-align: center">{{ $item->subCategory }}</h2>
                <table style="width:100%;border-collapse:collapse">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black">Referance</th>
                            <th style="border: 1px solid black">Produit</th>
                            <th style="border: 1px solid black">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\Order::where('subCategory', '=', $item->subCategory)->orderBy('product')->get() as $item)
                            @if ($loop->first)
                                @php
                                    $curent_product = $item->product;
                                    $count = 0;
                                @endphp
                            @endif
                            @php
                                $count += $item->qty;
                            @endphp
                            @if ($item->product !== $curent_product)
                                <tr>
                                    <td></td>
                                    <td style="text-align: right ;color: red"><b>Total </b></td>
                                    <td style="border: 1px solid black ;color: red"><b>{{ $count - $item->qty }}</b>
                                    </td>
                                </tr>
                                @php
                                    $curent_product = $item->product;
                                    $count = $item->qty;
                                @endphp
                            @endif
                            @php
                                $number = intval(preg_replace('/[^0-9]/', '', $item->product));
                                $qty = $item->qty * $number;
                            @endphp
                            <tr>
                                <td style="border: 1px solid black">{{ $item->order_number }}</td>
                                <td style="border: 1px solid black">{{ $item->product }} </td>
                                <td style="border: 1px solid black">
                                    @if ($qty === 0)
                                        {{ $count }}
                                    @else
                                        {{ $qty }}
                                    @endif
                                </td>
                            </tr>
                            @if ($loop->last)
                                <tr>
                                    <td></td>
                                    <td style="text-align: right ;color: red"><b>Total </b></td>
                                    <td style="border: 1px solid black ;color: red"><b>{{ $count }}</b></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <footer>
                    <span> ANGLE BD ABDELMOUMEN & RUE SOUMAYA RES SHEHRAZADE 3 ETG 4 N 20 Casablanca </span><br>
                    0600038001 - RC: 543099 - Patente: 34778910 - Identifiant fiscal: 52459261 - ICE: 003068414000037 -
                    CNSS:
                    4537783 - EMAIL: <b>support@veryfrais.com</b>
                </footer>
                <div class="page-break"></div>
            @endforeach
        @else
            <table style="width:100%">
                <tr>
                    <td>
                        <img style="margin-top: 50px"
                            src="https://veryfrais.com/public/storage/restaurant/2022-09-23-632d303dc15f3.png"
                            width="160px" height="75px" /><br>
                        <b>Phone :</b> 0600038001 <br>
                        <b>Email :</b> support@veryfrais.com <br>
                        <b>Adresse :</b> ANGLE BD ABDELMOUMEN <br> & RUE SOUMAYA RES SHEHRAZADE <br> 3 ETG 4 N 20
                        Casablanca <br>
                        <b>ICE :</b>003068414000037 <br>
                        <br><br><br><br><br><br><br>
                    </td>
                    <td>
                        <h1>Bon de commande </h1>
                        <b>Commande N° : </b> {{ $numero_command }} - {{ date('Y') }} <br>
                        <b>Date</b> : {{ $previousDay }} <br><br>
                        <b>Fournisseur : </b> nom <br>
                        <b>Email : </b> email@email.com <br>
                        <b>Adresse : </b> adresse here <br>
                        <b>Telephone : </b> 0600000000 <br>
                    </td>
                </tr>
            </table>
            <h2 style="text-align: center">{{ $item }}</h2>
            <table style="width:100%; border-collapse:collapse">
                <thead>
                    <tr>
                        <th style="border: 1px solid black">Référence</th>
                        <th style="border: 1px solid black">Produit</th>
                        <th style="border: 1px solid black">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\Order::where('category', '=', $item)->orderBy('product')->get() as $item)
                        @if ($loop->first)
                            @php
                                $curent_product = $item->product;
                                $count = 0;
                            @endphp
                        @endif
                        @php
                            $count += $item->qty;
                        @endphp
                        @if ($item->product !== $curent_product)
                            <tr>
                                <td></td>
                                <td style="text-align: right ;color: red"><b>Total </b></td>
                                <td style="border: 1px solid black ;color: red"><b>{{ $count - $item->qty }}</b></td>
                            </tr>
                            @php
                                $curent_product = $item->product;
                                $count = $item->qty;
                            @endphp
                        @endif
                        @php
                            $number = intval(preg_replace('/[^0-9]/', '', $item->product));
                            $qty = $item->qty * $number;
                        @endphp
                        <tr>
                            <td style="border: 1px solid black">{{ $item->order_number }}</td>
                            <td style="border: 1px solid black">{{ $item->product }} </td>
                            <td style="border: 1px solid black">
                                @if ($qty == 0)
                                    dfghjkl
                                @else
                                    {{ $qty }}
                                @endif
                            </td>
                        </tr>
                        @if ($loop->last)
                            <tr>
                                <td></td>
                                <td style="text-align: right ;color: red"><b>Total </b></td>
                                <td style="border: 1px solid black ;color: red"><b>{{ $count }}</b></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
        <footer>
            <span> ANGLE BD ABDELMOUMEN & RUE SOUMAYA RES SHEHRAZADE 3 ETG 4 N 20 Casablanca </span><br>
            0600038001 - RC: 543099 - Patente: 34778910 - Identifiant fiscal: 52459261 - ICE: 003068414000037 - CNSS:
            4537783 - EMAIL: <b>support@veryfrais.com</b>
        </footer>
        <div class="page-break"></div>
    @endforeach


</body>

</html>
