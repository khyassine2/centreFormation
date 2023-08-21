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
              <form id="contact" action="{{route('formations.update',$form->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row" style="display: flex; flex-direction: column">
                  <div class="col-lg-12">
                    <h2>Ajouter Formation</h2>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="formFile" class="form-label">Titre de formation</label>
                      <input value="{{$form->title}}" name="title" type="text" id="titre" placeholder="Titre..." required="">
                    </fieldset>
                  </div>
                  <div class="row" style="padding-left: 15px;">
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="prix" class="form-label">Prix de formation (par DH)</label>
                            <input value="{{$form->prix}}" name="prix" type="text" id="prix" placeholder="prix..." required="">
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                        <label for="bancs" class="form-label">Nombre de places </label>
                        <input value="{{$form->bancs}}" name="bancs" type="text" id="bancs" placeholder="Nombre..." required="">
                        </fieldset>
                    </div>
                  </div>
                  <div class="row" style="padding-left: 15px;">
                    <div class="col-lg-6">                   
                        <fieldset>
                          <label for="dateD" class="form-label">Date de début d'inscription</label>
                          <input value="{{$form->dateD}}" name="dateD" type="date" id="dateD" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-6">                   
                        <fieldset>
                          <label for="dateF" class="form-label">Date de fin d'inscription</label>
                          <input value="{{$form->dateF}}" name="dateF" type="date" id="dateF" required="">
                        </fieldset>
                      </div>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                        <label for="formFile" class="form-label">Image de formation</label>
                        <input value="{{$form->image}}" style="height: 26px;" name="image" class="form-control" type="file" id="formFile">
                    </fieldset>
                  </div>
                  <div class="row" style="padding-left: 15px;">
                      <div class="col-lg-6">
                        <fieldset>
                          <label for="prof" class="form-label">Categorie de formation</label>
                          <select class="form-select" name="idCat" id="Cat">
                            <option selected>select le catigorie de formation</option>
                            @foreach ($cats as $cat)
                                <option value="{{$cat->id}}" {{$cat->id == $form->categorie->id?'Selected':''}}>{{$cat->titre}}</option>
                            @endforeach
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-lg-6">
                        <fieldset>
                            <label for="Cat" class="form-label">Formateur de formation</label>
                          <select class="form-select" name="prof" id="prof">
                            <option selected>select le Formateur de formation</option>
                            @foreach ($profs as $pro)
                                <option value="{{$pro->id}}"  {{$pro->id == $form->prof_id?'Selected':''}}>{{$pro->name}}</option>
                            @endforeach
                          </select>
                        </fieldset>
                      </div>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="description" class="form-label">Description :</label>
                      <textarea name="description" type="text" class="form-control" id="description" placeholder="description..." required="">{{$form->description}}</textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">Update</button>
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
    document.getElementById("dateD").setAttribute("min", time);
    document.getElementById('dateD').setAttribute("min", time);
    day = date.getDate()+2
    time = year+'-'+month+'-'+day
    document.getElementById("dateF").setAttribute("min", time);
</script>
@endsection