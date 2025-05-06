<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> Mon profil </title>
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
                          <a class="dropdown-item" href="{{url('produits')}}"> <i class="fas fa-plus"></i> Ajouter un produit </a>
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
                          class="nav-link active  dropdown-toggle"
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
                          <a class="dropdown-item" href="{{url('produits')}}"> <i class="fas fa-plus"></i> Ajouter un produit </a>
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
                          class="nav-link active  dropdown-toggle"
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
                          <a class="dropdown-item" href="{{url('produits')}}"> <i class="fas fa-plus"></i> Ajouter un produit </a>
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
                          class="nav-link active  dropdown-toggle"
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
                <h2 class="tm-block-title d-inline-block"> Mon profil </h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <?php
                    $user = Auth::user();
                ?>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Oups !</strong> Veuillez corriger les erreurs ci-dessous :
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session(''))
                <p style="color:orange"> {{session('updateBoutique')}}</p>
                @endif
                <form action="/modifier_profil" method="POST" enctype="multipart/form-data" class="tm-edit-product-form">
                @csrf
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      > nom Utilisateur
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      value="{{$user->name}}"
                      class="form-control validate"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="email"
                      > Email Utilisateur
                    </label>
                    <input
                      id="email"
                      name="email"
                      type="email"
                      value="{{$user->email}}"
                      class="form-control validate"
                    />
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="contact utilisateur"
                      > Contact utilisateur
                    </label>
                    <input
                      id="contact_utilisateur"
                      name="contact"
                      value="{{$user->contact}}"
                      type="tel"
                      class="form-control validate"
                    />
                  </div>
                  <div class="row">
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                        <label
                          for="password"
                          > mot de passe
                        </label>
                        <input
                          id="password"
                          name="password"
                          type="password"
                          class="form-control validate"
                        />
                      </div>
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                        <label
                          for="password"
                          > confirme le password
                        </label>
                        <input
                          id="password"
                          name="password_confirmation"
                          type="password"
                          class="form-control validate"
                        />
                      </div>
                </div>

                  <input type="hidden" value="{{$user->id}}" name="id" id="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto" onclick="document.getElementById('fileInput').click();" style="cursor:pointer;">
                    <img id="previewImage" src="{{asset('img/'.$user->image_utilisateur)}}" alt="Image à remplacer"
                         style="width: 100%; height: 100%; object-fit: cover;" />
                </div>
                <div class="custom-file mt-3 mb-3">
                    <input id="fileInput" name="image_utilisateur" type="file" accept="image/*" style="display:none;" onchange="previewFile()" />
                </div>
             </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase"> Modifier mon profil  </button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('footer')
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
