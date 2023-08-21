@extends('admin/users/layout')
@section('titre','index')
@section('main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<section style="margin: auto" class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center" style="margin: auto">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="{{route('join.store')}}" method="post">
                @csrf
                <div class="row" style="display: flex; flex-direction: column">
                  <div class="col-lg-12">
                    <h2>Rejoindre la Formation</h2>
                  </div>
                  <div class="row" style="padding-left: 15px;">
                      <p>Etudiant deja rejoindre a cette formation</p>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <a href="{{route('etudiant.index')}}">Retour</a>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Etudiant</h6>
                <span><a href="{{route('etudiant.create')}}">Ajouter etudiant</a></span>
              </li>
              <li>
                <span><a href="/les_formations"></a></span>
              </li>
            </ul>
          </div>
        </div> --}}
      </div>
    </div>
</section>
<script>
    date = new Date()
    year = date.getFullYear()
    month = date.getMonth()+1
    day = date.getDate()
    if (month<10) {
        month = '0'+month
    }
    time = year+'-'+month+'-'+day
    document.getElementById('dateD').setAttribute("min", time);
    function change() {
      date1 = document.getElementById('dateD').value
      document.getElementById("dateF").setAttribute("min", date1);
    }
</script>
@endsection