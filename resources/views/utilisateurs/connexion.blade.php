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
                <h2 class="tm-block-title mb-4">Connectez-vous </h2>
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
                @if (session('status_error'))
                    <div class="alert alert-danger">
                        {{ session('status_error') }}
                    </div>
                @endif
                @if (session('status_pas_error'))
                <div class="alert alert-danger">
                    {{ session('status_pas_error') }}
                </div>
                @endif
                <form action="/connexion_code" method="post" class="tm-login-form">
                @csrf
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
                  <div class="form-group mt-3">
                    <p style="color: white"> souvenez-vous de moi <input type="checkbox" name="remember" class="form-control " id="remember"> </p>
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Connectez-vous
                    </button>
                  </div>
                  <p style="color: white">  Mot de passe Oublié ? : <a href="pass_oublie" style="color: orange;"> cliquez ici </a> </p>
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
