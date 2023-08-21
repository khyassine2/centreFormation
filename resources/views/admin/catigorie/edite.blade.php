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
              @if (request()->get('op') == '1')
              <form id="contact" action="{{route('catigorie.destroy',$cat->id)}}" method="post">
                @csrf
                @method('delete')
                <div class="row" style="display: flex; flex-direction: column">
                  <div class="col-lg-12">
                    <h2>Supprimer Catigorie</h2>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="formFile" class="form-label">Titre de Catigorie</label>
                      <input readonly name="titre" value="{{$cat->titre}}" type="text" id="titre" placeholder="Titre..." required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="description" class="form-label">Description :</label>
                      <textarea readonly name="description" type="text" class="form-control" id="description" placeholder="description..." required="">{{$cat->description}}</textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">Supprimer</button>
                    </fieldset>
                  </div>
                </div>
              </form>
              @else
              <form id="contact" action="{{route('catigorie.update',$cat->id)}}" method="post">
                @csrf
                @method('put')
                <div class="row" style="display: flex; flex-direction: column">
                  <div class="col-lg-12">
                    <h2>Ajouter Catigorie</h2>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="formFile" class="form-label">Titre de Catigorie</label>
                      <input name="titre" value="{{$cat->titre}}" type="text" id="titre" placeholder="Titre..." required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="description" class="form-label">Description :</label>
                      <textarea name="description" type="text" class="form-control" id="description" placeholder="description..." required="">{{$cat->description}}</textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">Modifier</button>
                    </fieldset>
                  </div>
                </div>
              </form>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection