<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> CAMES STORE </title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vente.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
  </head>

  <body>
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            @auth
                @if (Auth::user()->role == 'admin')
                <a class="navbar-brand" href="{{url('myProfil')}}">
                    <h1 class="tm-site-title mb-0">POINT DE VENTE </h1>
                  </a>
                  <button
                    class="navbar-toggler ml-auto mr-0"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <i class="fas fa-bars tm-nav-icon"></i>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link  dropdown-toggle"
                          href="#"
                          id="navbarDropdown"
                          role="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fas fa-shopping-cart"></i>
                          <span> Produits <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('produits')}}">  <i class="fas fa-plus"></i> Ajouter un produit </a>
                          <a class="dropdown-item" href="{{url('rapport_produits')}}"> <i class="fas fa-file-alt"></i> Rapport Produits </a>
                        </div>
                      </li>

                     <li class="nav-item dropdown">
                        <a
                        class="nav-link  dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >
                        <i class="fas fa-truck"></i>
                        <span> Fournisseurs <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('fournisseurs')}}"> <i class="fas fa-plus"></i> Ajouter un fournisseur </a>
                        <a class="dropdown-item" href="{{url('rapport_fournisseurs')}}"> <i class="fas fa-file-alt"></i> Rapport fournisseurs </a>
                        <a class="dropdown-item" href="{{url('approvisionnement')}}"> <i class="fas fa-plus"></i> reapprovisionner </a>
                        <a class="dropdown-item" href="{{url('rap_approvisionnement')}}"> <i class="fas fa-file-alt"></i> Rapport reapprovisionnements </a>
                        </div>
                     </li>

                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="#"
                          id="navbarDropdown"
                          role="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fas fa-file"></i>
                          <span> Ventes  <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('vendre')}}"> <i class="fas fa-plus"></i> ajouter une vente </a>
                          <a class="dropdown-item" href="{{url('rap_ventes')}}"> <i class="fas fa-file-alt"></i> Rapport ventes </a>
                        </div>
                      </li>
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link  dropdown-toggle"
                          href="#"
                          id="navbarDropdown"
                          role="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fas fa-user"></i>
                          <span> comptes <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('utilisateurs')}}"> <i class="fas fa-insert"></i> ajouter un utilisateur </a>
                          <a class="dropdown-item" href="{{url('myProfil')}}"> <i class="fas fa-edit"></i> modifier mon profil </a>
                          <a class="dropdown-item" href="{{url('rapport_gestionnaires')}}"> <i class="fas fa-user"></i> Tous les employés </a>
                          <a class="dropdown-item" href="{{url('deconnexion')}}"> <i class="fas fa-sign-out-alt"></i> deconnexion </a>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link  dropdown-toggle"
                          href="#"
                          id="navbarDropdown"
                          role="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fas fa-home"></i>
                          <span>  @if (isset($boutique_active)){{$boutique_active->nom_boutique}}@endif  <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('myBoutique')}}"> <i class="fas fa-edit"></i> modifier ma boutique </a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="statistiques">
                            <i class="fas fa-chart-line"></i>
                            statistiques
                        </a>
                      </li>
                    </ul>
                  </div>
                @endif
            @endauth
        </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php $user = Auth::user(); ?>
                    <p class="text-white mt-5 mb-5">Welcome back, <b> {{$user->name}}</b></p>
                </div>
            </div>
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title"> Meilleurs clients </h2>
                        @foreach ($topClients as $client)
                            <li style="color: white">{{ $client->nom_client }} - {{ number_format($client->total, 0, ',', ' ') }} FCFA</li>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title"> Meilleurs produits </h2>
                        <ul>
                            @foreach ($topProduits as $produit)
                            <li style="color: white">{{ $produit->nom_produit }} - {{ number_format($produit->total_vendu, 0, ',', ' ') }} FCFA</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title"> Revenus Par Mois </h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> Mois </th>
                                    <th scope="col"> chiffre d'affaires </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventesParMois as $vente )
                                <tr>
                                    <td style="color: white">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m', $vente->mois)->translatedFormat('F Y') }}
                                    </td>
                                    <td style="color: white">{{ number_format($vente->total_mensuel, 0, ',', ' ') }} FCFA</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('footer')
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tooplate-scripts.js"></script>
</body>

</html>