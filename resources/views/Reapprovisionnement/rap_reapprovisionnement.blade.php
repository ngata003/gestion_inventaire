<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> Espace Approvisionnement </title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
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
                        class="nav-link active dropdown-toggle"
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
                        <a class="nav-link " href="statistiques">
                            <i class="fas fa-chart-line"></i>
                            statistiques
                        </a>
                      </li>
                    </ul>
                  </div>
                @endif

                @if (Auth::user()->role == 'vendeur')
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
                        class="nav-link active dropdown-toggle"
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
                          <a class="dropdown-item" href="{{url('myProfil')}}"> <i class="fas fa-edit"></i> modifier mon profil </a>
                          <a class="dropdown-item" href="{{url('deconnexion')}}"> <i class="fas fa-sign-out-alt"></i> deconnexion </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                @endif
                @if (Auth::user()->role == 'magasinier')
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
                        class="nav-link active  dropdown-toggle"
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
                          <a class="dropdown-item" href="{{url('myProfil')}}"> <i class="fas fa-edit"></i> modifier mon profil </a>
                          <a class="dropdown-item" href="{{url('deconnexion')}}"> <i class="fas fa-sign-out-alt"></i> deconnexion </a>
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
              @if (session('success_reapprovisionnement'))
                <p style="color:orange"> {{session('success_reapprovisionnement')}}</p>
              @endif
              @if (session('update_gestionnaire'))
              <p style="color:orange"> {{session('update_gestionnaire')}}</p>
              @endif
              @if (session('approv_delete'))
              <p style="color:orange"> {{session('approv_delete')}}</p>
              @endif
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col"> produit   </th>
                    <th scope="col">  quantite      </th>
                    <th scope="col"> fournisseur </th>
                    <th scope="col"> total </th>
                    <th scope="col"> date </th>
                    <th scope="col"> status </th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($approvisionnement as $approv )
                    <tr>
                        <th scope="row"><input type="checkbox" /></th>
                        <td class="tm-product-name"> {{$approv->nom_produit}} </td>
                        <td> {{$approv->qte_ajoutee}} </td>
                        <td> {{$approv->nom_fournisseur}} </td>
                        <td> {{$approv->montant_total}}</td>
                        <td> {{$approv->date_reapprovisionnement}} </td>
                        <td> {{$approv->status}} </td>
                        <td>
                          <a href="/delete_reapprovisionnement/{{$approv->id}}" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                          </a>
                          <a href="/update_reapprovisionnement/{{$approv->id}}" class="tm-product-delete-link">
                            <i class="fas fa-edit tm-product-delete-icon"></i>
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
            <h2 class="tm-block-title"> Rechercher reapprovisionnements </h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                    <tr>
                        <td colspan="2" class="tm-product-name">
                          <form action="/search_approv" method="GET" style="display: flex; align-items: center;">
                            <input
                              type="text"
                              name="search"
                              placeholder="One name..."
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
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
  </body>
</html>
