<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> page ventes </title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/vente.css')}}">
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
    <div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="tm-block-title d-inline-block">creer une facture</h2>
            </div>
            </div>
            <div class="col-12">
                <form action="/add_ventes" method="post"  class="tm-edit-product-form" id="monFormulaire">
                @csrf
                <div class="col-12">
                    <div class="el">
                    <div class="output">
                        <input type="number" id="total_general" placeholder="somme totale" name="montant_total">
                    </div>
                    <div class="output">
                        <input type="number" id="montant_paye" placeholder="montant paye" style="width: 160px" name="montant_paye">
                    </div>
                    <div class="output">
                        <input type="number" id="rendu" placeholder="rendu" readonly style="width: 140px" name="remboursement">
                    </div>
                    <div class="output">
                        <input type="text" name="nom_client" id="nom_client" placeholder="nom client" style="width: 170px">
                    </div>

                    </div>

                    <div class="al ">
                        </div>
                        <div class="input">
                        <select id="id_produit0" onchange="loadProductInfo(this.value,0)" name="nom_produit0" required onchange="loadProductInfo(this.value ,0)"  style="background-color: #54657d; width: 190px; height: 50px;  color: #fff; ">
                            <option value="">Sélectionner un produit</option>
                            @foreach ($produits as $prod )
                            <option value="{{$prod->nom_produit}}">{{$prod->nom_produit}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="input">
                            <div class="input">
                            <input type="number" class="end" id="quantite0" name="qte_commandee0" value="1" style="background-color: #54657d; width: 130px ; height: 50px; color: #fff;" onchange="calculateTotal(0);" />
                        </div>
                        <div class="input">
                            <input id="prix_vente0" name="prix_vente0" placeholder="prix unitaire0" class="end" type="number" style="background-color: #54657d; width: 140px; height: 50px; color: #fff;" onchange="calculateTotal(0);" required />
                        </div>
                        <div class="input">
                            <input id="total0" name="total0" type="number" class="end" placeholder="total" style="background-color: #54657d; width: 200px; height: 50px; color: #fff;" readonly/>
                        </div>
                </div>
                <input type="hidden" name="numRows" id="numRows" value="1" onchange="calculateTotals()">
                <div class="col-12">
                    <button type="submit"  id="addButton" onclick="addDiv(event)" class="btn btn-primary btn-block text-uppercase"> ajouter un nouveau produit </button>
                    <input type="submit" value=" enregistrez la vente" class="btn btn-primary btn-block text-uppercase"  name="save">
                </div>
                </div>
                </form>

            </div>
        </div>
        </div>
        </div>
    </div>
    @include('footer')
    <script type="text/javascript">
        let total = document.getElementById('total_general');
        let montant = document.getElementById('montant_paye');
        let rendu = document.getElementById('rendu');

        function setTotal(){
            let rendus = Number(montant.value) - Number(total.value);
            rendu.value = rendus;
            }
            total.addEventListener("change",setTotal);
            montant.addEventListener("change",setTotal);
    </script>
    <script type="text/javascript">
    var i = 0;
    var j = 2;

    function calculateTotal(index) {
    var quantiteInput = document.getElementById('quantite' + index);
    var prixVenteInput = document.getElementById('prix_vente' + index);
    var totalInput = document.getElementById('total' + index);

    var quantite = parseFloat(quantiteInput.value);
    var prixVente = parseFloat(prixVenteInput.value);

    var total = quantite * prixVente;

    totalInput.value = total;

    // Handle calculation for input with id "total0"
    if (index === 0) {
      var total0Input = document.getElementById('total0');
      total0Input.value = total;
    }
    var sum = 0;
    for (var i = 0; i <= index; i++) {
      var currentTotalInput = document.getElementById('total' + i);
      var currentTotal = parseFloat(currentTotalInput.value);
      sum += currentTotal;
    }

    // Update the value of the hidden input field
    var totalGeneralInput = document.getElementsByName('montant_total')[0];
    totalGeneralInput.value = sum;
  }


    let w = 1; // car le premier produit est l’index 0
    let v = 1;

    function addDiv(event) {
        event.preventDefault();

        var num = document.getElementById('numRows');


        var form = document.getElementById('monFormulaire');
        var newDiv = document.createElement('div');
        newDiv.setAttribute('class', 'input');

        newDiv.innerHTML = `
        <div class="input">
            <select id="id_produit${v}" name="nom_produit${v}" onchange="loadProductInfo(this.value, ${v})" required style="background-color: #54657d; width: 190px; height: 50px; color: #fff;">
                <option value="">Sélectionner un produit</option>
                @foreach ($produits as $prod )
                <option value="{{ $prod->nom_produit }}">{{ $prod->nom_produit }}</option>
                @endforeach
            </select>
        </div>
        <div class="input">
            <input type="number" class="end" id="quantite${v}" name="qte_commandee${v}" value="1" style="background-color: #54657d; width: 140px; height: 50px; color: #fff;" onchange="calculateTotal(${v});" />
        </div>
        <div class="input">
            <input id="prix_vente${v}" name="prix_vente${v}" placeholder="prix unitaire${v}" class="end" type="number" style="background-color: #54657d; width: 170px; height: 50px; color: #fff;" onchange="calculateTotal(${v});" required />
        </div>
        <div class="input">
            <input id="total${v}" name="total${v}" type="text" class="end" placeholder="total" style="background-color: #54657d; width: 140px; height: 50px; color: #fff;" required readonly />
        </div>
        `;

        var addButton = document.getElementById('addButton');
        addButton.parentNode.insertBefore(newDiv, addButton);

        w++; // augmenter j après l'ajout
        num.value = w;
        v++;
    }
</script>
<script>
    function loadProductInfo(nom_produit,i){
        $.ajax({
            url:'/get_product_details',
            type:'POST',
            data:{
                nom_produit:nom_produit,
                _token: '{{ csrf_token() }}',
            },

            success:function(response){
                $('#prix_vente'+i).val(response.prix_vente);
            },

            error:function(xhr,status,error){
                console.error(xhr.responseText);
            },
        });
    }
</script>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
