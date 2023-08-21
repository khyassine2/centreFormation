@extends('admin/users/layout')
@section('titre','index')
@section('main')
<style>
  @media print{
    .mabayenx{
      display: none;
    }
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<section style="margin: auto" class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center" style="margin: auto">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="{{route('catigorie.store')}}" method="post">
                @csrf
                <div class="row" style="display: flex; flex-direction: column">
                  <div class="col-lg-12">
                    <h2>Valider :</h2>
                  </div>
                  
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="formFile" class="form-label">Payer par bank</label>
                      <p>verser le montant {{$x[0]->prix}} DH a compte bancaire : 000000000000000000</p>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 mabayenx">
                    <fieldset>
                      <label for="description" class="form-label">Ou Cash:</label>
                      <p>Après deux jours</p>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 mabayenx">
                    <fieldset>
                      <button onclick="window.print()">imprimer recu</button>
                      <a style="font-size: 13px;
                      color: #fff;
                      background-color: #a12c2f;
                      padding: 12px 30px;
                      display: inline-block;
                      border-radius: 22px;
                      font-weight: 500;
                      text-transform: uppercase;
                      transition: all .3s;
                      border: none;
                      outline: none;" href="{{route('facture.index')}}">retour</a>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection