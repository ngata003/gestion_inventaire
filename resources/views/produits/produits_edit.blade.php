<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> Modifier Produits </title>
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
            @auth()
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
                      <a class="dropdown-item" href="{{url('produits')}}"> <i class="fas fa-plus"></i> Ajouter un produit </a>
                      <a class="dropdown-item" href="{{url('rapport_produits')}}"> <i class="fas fa-file-alt"></i> Rapport Produits </a>
                    </div>
                  </li>
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
                      <a class="dropdown-item" href="{{url('rapport_gestionnaires')}}"> <i class="fas fa-file-alt"></i> Tous les employés </a>
                      <a class="dropdown-item" href="{{url('deconnexion')}}"> <i class="fas fa-sign-out-alt"></i> deconnexion </a>
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
                      <i class="fas fa-home"></i>
                      <span>  @if (isset($boutique_active)){{$boutique_active->nom_boutique}}@endif  <i class="fas fa-angle-down"></i> </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{url('myBoutique')}}"> <i class="fas fa-edit"></i> modifier ma boutique </a>
                    </div>
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
                      <a class="dropdown-item" href="{{url('produits')}}"> <i class="fas fa-plus"></i> Ajouter un produit </a>
                      <a class="dropdown-item" href="{{url('rapport_produits')}}"> <i class="fas fa-file-alt"></i> Rapport Produits </a>
                    </div>
                  </li>
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
                      <a class="dropdown-item" href="{{url('produits')}}"> <i class="fas fa-plus"></i> Ajouter un produit </a>
                      <a class="dropdown-item" href="{{url('rapport_produits')}}"> <i class="fas fa-file-alt"></i> Rapport Produits </a>
                    </div>
                  </li>
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
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block"> Modifier Produit </h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="/product_edit" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                    @csrf
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      > Nom Produit
                    </label>
                    <input
                      id="nom_produit"
                      name="nom_produit"
                      type="text"
                      value="{{$product->nom_produit}}"
                      class="form-control validate"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea class="form-control validate tm-small" rows="5" name="description_produit" required>{{$product->description_produit}}</textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="categorie_produit"
                      >categorie produit </label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="" name="categorie_produit"
                    >
                      <option selected value="{{$product->categorie_produit}}">Selectionnez une categorie </option>
                      <option value="agro_alimentaire"> AgroAlimentaire </option>
                      <option value=" sante "> Sante </option>
                      <option value="biere"> biere </option>
                      <option value="Sport"> Sports </option>
                      <option value="fashion"> fashion </option>
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="prix_vente"
                            > prix vente
                          </label>
                          <input
                            id="prix_vente"
                            name="prix_vente"
                            type="number"
                            value="{{$product->prix_vente}}"
                            class="form-control validate"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >qte commandee
                          </label>
                          <input
                            id="qte_commandee"
                            name="quantite_produit"
                            type="number"
                            value="{{$product->quantite_produit}}"
                            class="form-control validate"
                          />
                        </div>
                        <input type="hidden" name="id" value="{{$product->id}}">
                  </div>

              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto" onclick="document.getElementById('fileInput').click();" style="cursor:pointer;">
                    <img id="previewImage" src="{{asset('img/'.$product->image_produit)}}" alt="Image à remplacer"
                         style="width: 100%; height: 100%; object-fit: cover;" />
                </div>
                <div class="custom-file mt-3 mb-3">
                    <input id="fileInput" name="image_produit" type="file" accept="image/*" style="display:none;" onchange="previewFile()" />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase"> Modifier Produit </button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('footer')
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        function previewFile() {
               var fileInput = document.getElementById('fileInput');
               var previewImage = document.getElementById('previewImage');

               var file = fileInput.files[0];
               var reader = new FileReader();

               reader.onloadend = function () {
                   previewImage.src = reader.result;
               }

               if (file) {
                   reader.readAsDataURL(file);
               }
           }

           function triggerFileInput() {
               document.getElementById('fileInput').click();
           }

   </script>
  </body>
</html>
