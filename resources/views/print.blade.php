<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon de commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .invoice h2 {
            margin-top: 0;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        .invoice-items {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-items th,
        .invoice-items td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }

        .company-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="invoice">
        <div class="company-logo">BOOKIFY</div>
        <h2>Bon de commande</h2>
        <div class="invoice-details">
            <p><strong>Nom du Client :</strong> {{ $client }}</p>
            <p><strong>Numéro de bon de commande :</strong> #{{ $record->id }}</p>
            <p><strong>Date de commande:</strong> {{ $record->created_at }}</p>
            <p><strong>Date de livraison :</strong> {{ date('d-m-Y') }}</p>
        </div>
        <table class="invoice-items">
            <thead>
                <tr>
                    <th>Livre</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($record->books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->pivot->quantity }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->price * $book->pivot->quantity }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="invoice-total">
            @isset($record->coupon_id)
                <p style="text-decoration:line-through"><strong>Prix Initial :</strong> {{ $initialprice }}</p>
                <p><strong>Coupon Utilisé :</strong> {{ $record->coupon->code }}</p>
            @endisset
            <p><strong>Prix Final :</strong> {{ $record->total_price }}</p>
        </div>
    </div>

</body>

</html>
