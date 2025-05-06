<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> rapport ventes </title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            @auth
                @if (Auth::user()->role == 'admin')
                <a class="navbar-brand" href="/myProfil">
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
                          <a class="dropdown-item" href="/produits"> <i class="fas fa-plus"></i> Ajouter un produit </a>
                          <a class="dropdown-item" href="/rapport_produits"> <i class="fas fa-file-alt"></i> Rapport Produits </a>
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
                          class="nav-link active dropdown-toggle"
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
                          <a class="dropdown-item" href="/vendre"> <i class="fas fa-plus"></i> ajouter une vente </a>
                          <a class="dropdown-item" href="/rap_ventes"> <i class="fas fa-file-alt"></i> Rapport ventes </a>
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
                          <a class="dropdown-item" href="/utilisateurs"> <i class="fas fa-insert"></i> ajouter un utilisateur </a>
                          <a class="dropdown-item" href="/myProfil"> <i class="fas fa-edit"></i> modifier mon profil </a>
                          <a class="dropdown-item" href="/rapport_gestionnaires"> <i class="fas fa-user"></i> Tous les employés </a>
                          <a class="dropdown-item" href="/deconnexion"> <i class="fas fa-sign-out-alt"></i> deconnexion </a>
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
                          <i class="fas fa-home"></i>
                          <span>  @if (isset($boutique_active)){{$boutique_active->nom_boutique}}@endif  <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/myBoutique"> <i class="fas fa-edit"></i> modifier ma boutique </a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="statistiques">
                            <i class="fas fa-chart-line"></i>
                            statistiques
                        </a>
                      </li>
                    </ul>
                  </div>
                @endif

                @if (Auth::user()->role == 'vendeur')
                <a class="navbar-brand" href="/myProfil">
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
                          <a class="dropdown-item" href="/produits"> <i class="fas fa-plus"></i> Ajouter un produit </a>
                          <a class="dropdown-item" href="/rapport_produits"> <i class="fas fa-file-alt"></i> Rapport Produits </a>
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
                          <a class="dropdown-item" href="{{url('approvisionnement')}}"> <i class="fas fa-plus"></i> reapprovisionner </a>
                          <a class="dropdown-item" href="{{url('rap_approvisionnement')}}"> <i class="fas fa-file-alt"></i> Rapport reapprovisionnements </a>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link active dropdown-toggle"
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
                          <a class="dropdown-item" href="/vendre"> <i class="fas fa-plus"></i> ajouter une vente </a>
                          <a class="dropdown-item" href="/rap_ventes"> <i class="fas fa-file-alt"></i> Rapport ventes </a>
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
                          <a class="dropdown-item" href="/myProfil"> <i class="fas fa-edit"></i> modifier mon profil </a>
                          <a class="dropdown-item" href="/deconnexion"> <i class="fas fa-sign-out-alt"></i> deconnexion </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                @endif

                @if (Auth::user()->role == 'magasinier')
                <a class="navbar-brand" href="/myProfil">
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
                          <a class="dropdown-item" href="/produits"> <i class="fas fa-plus"></i> Ajouter un produit </a>
                          <a class="dropdown-item" href="/rapport_produits"> <i class="fas fa-file-alt"></i> Rapport Produits </a>
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
                          <a class="dropdown-item" href="{{url('approvisionnement')}}"> <i class="fas fa-plus"></i> reapprovisionner </a>
                          <a class="dropdown-item" href="{{url('rap_approvisionnement')}}"> <i class="fas fa-file-alt"></i> Rapport reapprovisionnements </a>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link active dropdown-toggle"
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
                          <a class="dropdown-item" href="/vendre"> <i class="fas fa-plus"></i> ajouter une vente </a>
                          <a class="dropdown-item" href="/rap_ventes"> <i class="fas fa-file-alt"></i> Rapport ventes </a>
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
                          <a class="dropdown-item" href="/myProfil"> <i class="fas fa-edit"></i> modifier mon profil </a>
                          <a class="dropdown-item" href="/deconnexion"> <i class="fas fa-sign-out-alt"></i> deconnexion </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                @endif
            @endauth
        </div>
    </nav>

    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                @if (session('success_delete'))
                <p style="color:orange"> {{session('delete_gestionnaire')}}</p>
                @endif
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">  client  </th>
                    <th scope="col">  payé   </th>
                    <th scope="col">  total </th>
                    <th scope="col"> remboursé </th>
                    <th scope="col"> date   </th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ventes as $vent )
                    <tr>
                        <th scope="row"> {{$vent->id}}</th>
                        <td class="tm-product-name"> {{$vent->nom_client}} </td>
                        <td>{{$vent->montant_paye}}</td>
                        <td>{{$vent->montant_total}}</td>
                        <td> {{$vent->remboursement}}</td>
                        <td>{{$vent->created_at->format('d-m-y')}}</td>
                        <td>
                          <a href="/delete_ventes/{{$vent->id}}" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                          </a>
                          <a href="/voir_facture/{{$vent->id}}" class="tm-product-delete-link">
                            <i class="fas fa-print tm-product-delete-icon"></i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title"> Rechercher une vente </h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                    <tr>
                        <td colspan="2" class="tm-product-name">
                          <form action="/search_ventes" method="GET" style="display: flex; align-items: center;">
                            <input
                              type="text"
                              name="search"
                              placeholder="Rechercher un nom ou une date ..."
                              class="form-control validate"
                              style="background-color: #435c70; border: none; color: white;"
                            >
                            <button type="submit" style="background: none; border: none; margin-left: 10px;">
                              <i class="fas fa-search" style="color: white;"></i>
                            </button>
                          </form>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('footer')
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
