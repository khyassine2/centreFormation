<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('nav')
    <section class="contact-us" id="contact">
        <div class="container">
          <div class="row" style="
          width: 36%;
          margin: auto;">
            <div align='center' class="col-lg-12 align-self-center">
              <div class="row">
                <div class="col-lg-15">
                  <form onsubmit="return validate()" id="contact" action="{{route('etudiant.store')}}" method="post">
                    @csrf
                    <div  class="row">
                      <div class="col-lg-12">
                        <h2>Ajouter Etudiant :</h2>
                      </div>
                      <div class="col-lg-10">
                        <fieldset>
                          <legend style="font-size: 11pt">Nom & Prenom :</legend>
                          <input style="margin-left: 25px" name="name" type="text" id="name" placeholder="Nom & Prenom...*" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-10">
                      @can('isSupAdmin')
                        <div>
                          <label for="exampleRadios1">
                            User
                          </label>
                          <input type="radio" name="role" id="exampleRadios1" value="user" checked>
                          <label for="exampleRadios2">
                            Formateur
                          </label>
                          <input type="radio" name="role" id="exampleRadios2" value="prof" >
                            <label for="exampleRadios2">
                              Admin
                            </label>
                            <input type="radio" name="role" id="exampleRadios2" value="admin" >
                          @endcan
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <fieldset>
                            <legend style="font-size: 11pt">Phone :</legend>
                        <input name="phone" type="phone" id="phone" pattern="\+?[0-9]*" placeholder="phone...*" required="">
                      </fieldset>
                      </div><br>
                      <div class="col-lg-10">
                        <fieldset>
                            <legend style="font-size: 11pt">Email :</legend>
                        <input name="email" type="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email...*" required="">
                      </fieldset>
                      </div><br>
                      <div class="col-lg-10">
                        <fieldset>
                            <legend style="font-size: 11pt">Mot de passe :</legend>
                          <input name="password" type="password" id="password" placeholder="Mot de passe...*" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-10">
                        <fieldset>
                            <legend style="font-size: 11pt">Confirmer le mod de pass :</legend>
                          <input type="password" id="passwor" placeholder="Confirmer le mod de pass...*" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-10">
                        <fieldset id="rara">
                            
                        </fieldset>
                      </div>
                      <div class="col-lg-10">
                        <fieldset id="roro">
                            
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="button">Ajouter</button>
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
                    <h6>Phone Number</h6>
                    <span>010-020-0340</span>
                  </li>
                  <li>
                    <h6>Email Address</h6>
                    <span>info@meeting.edu</span>
                  </li>
                  <li>
                    <h6>Street Address</h6>
                    <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
                  </li>
                  <li>
                    <h6>Website URL</h6>
                    <span>www.meeting.edu</span>
                  </li>
                </ul>
              </div>
            </div> --}}
          </div>
        </div>
        @include('../fouter')
        <script>
            function validate(){
                var x= document.getElementById("password").value;
                var y= document.getElementById("passwor").value;
                document.getElementById("rara").innerHTML = '';
                if(x.length <  8) {  
                    document.getElementById("roro").innerHTML += '<div class="alert alert-danger" role="alert">Minimum 8 characters</div>';  
                    return false;  
                } 
                if(x != y) {  
                    document.getElementById("rara").innerHTML += '<div class="alert alert-danger" role="alert">les deux mots de passe ne correspondent pas</div>';  
                    return false;  
                }
            }
        </script>
</body>
</html>