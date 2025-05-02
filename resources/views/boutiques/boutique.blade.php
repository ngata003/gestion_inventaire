<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> Page Ajout Produits </title>
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
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block"> Enregistrer votre boutique </h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
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

                <form action="/boutique_insertion" class="tm-edit-product-form" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group mb-3">
                    <label
                      for="nom_boutique"
                      > nom boutique
                    </label>
                    <input
                      id="nom_boutique"
                      name="nom_boutique"
                      type="text"
                      class="form-control validate"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      > site web (facultatif)
                    </label>
                    <input
                      id="site_web_boutique"
                      name="site_web_boutique"
                      type=""
                      placeholder="www.fouelefack.com"
                      class="form-control validate"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      > email boutique
                    </label>
                    <input
                      id="email_boutique"
                      name="email_boutique"
                      type="email"
                      class="form-control validate"
                    />
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="localisation"
                            > Localisation
                          </label>
                          <input
                            id="localisation_boutique"
                            name="localisation_boutique"
                            type="text"
                            placeholder="ville"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="contact_boutique"
                            > contact boutique
                          </label>
                          <input
                            id="contact_boutique"
                            name="contact_boutique"
                            type="tel"
                            class="form-control validate"
                            required
                          />
                        </div>
                  </div>

              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto" onclick="document.getElementById('fileInput').click();" style="cursor:pointer;">
                    <img id="previewImage" src="img/avatar.png" alt="Image à remplacer"
                         style="width: 100%; height: 100%; object-fit: cover;" />
                </div>
                <div class="custom-file mt-3 mb-3">
                    <input id="fileInput" name="logo_boutique" type="file" accept="image/*" style="display:none;" onchange="previewFile()" />
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Enregistrer la boutique </button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function previewFile() {
            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];
            const preview = document.getElementById('previewImage');
            const reader = new FileReader();

            if (file) {
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
   </script>
  </body>
</html>
