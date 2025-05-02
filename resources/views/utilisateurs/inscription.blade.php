<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> page de connexion </title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css">
  </head>

  <body>
    <div>
    </div>

    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Bienvenue dans Point de Vente </h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
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

                <form action="/inscription_code" method="post" enctype="multipart/form-data" class="tm-login-form">
                    @csrf
                   <div class="form-group">
                    <label for="email"> Nom Utilisateur </label>
                    <input
                      name="name"
                      type="text"
                      class="form-control validate"
                      id="name"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="email"> Email </label>
                    <input
                      name="email"
                      type="email"
                      class="form-control validate"
                      id="email"
                      value=""
                      required
                    />
                  </div>
                   <div class="form-group">
                    <label for="email"> telephone: </label>
                    <input
                      name="contact"
                      type="tel"
                      class="form-control validate"
                      id="telephone"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="image_utilisateur"> Votre image </label>
                    <input
                      name="image_utilisateur"
                      type="file"
                      class="form-control validate"
                      id="image_utilisateur"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Mot de passe </label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      required
                    />
                  </div>
                  <input type="hidden" name="role" value="admin">
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      valider l'inscription
                    </button>
                  </div>
                  <p style="color: white;"> cliques ici si tu es deja connecté(e): <a href="connexion" style="color: orange;"> connexion </a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
