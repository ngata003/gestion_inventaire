<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 500px; /* Augmenté pour plus d'espace */
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Aligne en haut les deux éléments */
            margin-bottom: 30px;
        }

        .logo {
            width: 150px;
        }

        .logo img {
            width: 100%;
        }

        .facture-info {
            text-align: right;
            margin-left: auto; /* Assure que cela reste à droite */
        }

        .facture-info h2 {
            margin: 0;
        }

        .facture-info p {
            margin: 5px 0;
        }

        .client-info {
            margin-bottom: 30px;
        }

        .client-info h3 {
            margin: 0;
        }

        .client-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="{{ public_path('img/' . $logo) }}" height="75px" width="150px" alt="Logo">
            </div>
            <div class="facture-info">
                <h2>FACTURE</h2>
                <p>DATE: {{$date}}</p>
                <p>N° FACTURE: {{$id_facture}}</p>
            </div>
        </div>

        <div class="client-info">
            <h3> {{$nom_client}} </h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th> Libellé </th>
                    <th> Prix </th>
                    <th> Qté </th>
                    <th> Total </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventes as $vt)
                <tr>
                    <td>{{ $vt->nom_produit }}</td>
                    <td>{{ $vt->prix_vente }}</td>
                    <td>{{ $vt->qte_commandee }}</td>
                    <td>{{ $vt->total }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Montant payé</td>
                    <td class="total">{{ $montant_paye }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">Total achats</td>
                    <td class="total">{{ $montant_total }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">Remboursement</td>
                    <td class="total">{{ $remboursement }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            <p>Des questions? Envoyez-nous un e-mail à {{ $email }} ou appelez-nous au {{ $contact }}</p>
            <p>{{ $localisation }} - {{ $site_web }}</p>
            <p>MERCI !</p>
        </div>
    </div>
</body>
</html>
