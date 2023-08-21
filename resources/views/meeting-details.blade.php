<!DOCTYPE html>
<html lang="en">
  @include('header')
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>

   

  @include('nav')
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Obtenez tous les détails</h6>
          <h2>Outils d'enseignement et d'apprentissage</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <div class="price">
                    <span>${{$form->prix}}</span>
                  </div>
                  <div class="date">
                    <h6>{{date("M",strtotime($form->dateD))}}  <span>{{date("d",strtotime($form->dateD))}}</span></h6>
                  </div>
                  <img src="{{asset('storage/images/'.$form->image)}}" alt="">
                </div>
                <div class="down-content">
                  <h4>{{$form->title}}</h4>
                  <p class="description">
                    {{$form->description}}
                  </p>
                  <div class="row">
                    <div class="col-lg-4">
                      {{-- <div class="hours">
                        <h5>Hours</h5>
                        <p>Monday - Friday: 07:00 AM - 13:00 PM<br>Saturday- Sunday: 09:00 AM - 15:00 PM</p>
                      </div> --}}
                    </div>
                    <div class="col-lg-4">
                      <div class="location">
                        <h5>Localisation</h5>
                        <p>Le Centre Socioculturel D'approximité Sidi Brahim, 22H6+R25, Fès 30050, MOROCCO</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="book now">
                        <h5>contact :</h5>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button-red">
                <a href="/formation">Retour à la liste des formations</a>
                {{-- ---------------------------------------------------------------- --}}
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Mode payment </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Payment par :
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('join.store')}}" method="POST">
                          @csrf
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="form" value="{{$form->id}}">
                          <button style="margin-top: 20px;font-size: 13px;color: #fff;background-color: #a12c2f;padding: 12px 30px;display: inline-block;border-radius: 22px;
                          font-weight: 500;
                          text-transform: uppercase;
                          transition: all .3s;border: 0px" class="btn btn-primary" type="submit">Cash</button>
                        </form>
                        <form action="{{route('join.store')}}" method="POST">
                          @csrf
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="form" value="{{$form->id}}">
                          <button style="margin-top: 20px;font-size: 13px;color: #fff;background-color: #a12c2f;padding: 12px 30px;display: inline-block;border-radius: 22px;
                          font-weight: 500;
                          text-transform: uppercase;
                          transition: all .3s;border: 0px" class="btn btn-primary" type="submit">Numero de compte</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Carte bancaire :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <div class="panel panel-default credit-card-box">
                                  <div class="panel-heading display-table" >
                                    <div class="row display-tr" >
                                      <h3 class="panel-title display-td" >Details</h3>
                                      <div class="display-td" >                            
                                        <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                      </div>
                                    </div>                    
                                  </div>
                                <div class="panel-body">
                                {{-- @if (Session::has('success'))
                                  <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                  </div>
                                @endif --}}
                                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation " data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                  @csrf
                                  <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                      <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text'>
                                    </div>
                                  </div>
                                  <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                      <label class='control-label'>Card Number</label> <input
                                      autocomplete='off' class='form-control card-number' size='20'
                                      type='text'>
                                    </div>
                                  </div>
                                  <div class='form-row row'>
                                    <div class='row form-group cvc required'>
                                      <label class='control-label'>CVC</label> <input autocomplete='off'
                                      class='form-control card-cvc' placeholder='ex. 311' size='4'
                                      type='text'>
                                    </div>
                                    <div class='row form-group expiration required'>
                                      <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                    </div>
                                    <div class='row form-group expiration required'>
                                      <label class='control-label'>Expiration Year</label> <input
                                      class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                      type='text'>
                                    </div>
                                  </div>
                                  {{-- <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                      <div class='alert-danger alert'>Please correct the errors and try again.
                                      </div>
                                    </div>
                                  </div> --}}
                                  <div class="row">
                                    <div class="col-xs-12">
                                      <button class="btn btn-primary" type="submit">Pay Now (${{$form->prix}})</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>        
                          </div>
                        </div>
                      </div>
                      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
                      <script type="text/javascript">
                      $(function() {
                      var $form         = $(".require-validation");
                      $('form.require-validation').bind('submit', function(e) {
                      var $form         = $(".require-validation"),
                      inputSelector = ['input[type=email]', 'input[type=password]',
                      'input[type=text]', 'input[type=file]',
                      'textarea'].join(', '),
                      $inputs       = $form.find('.required').find(inputSelector),
                      $errorMessage = $form.find('div.error'),
                      valid         = true;
                      $errorMessage.addClass('hide');
                      $('.has-error').removeClass('has-error');
                      $inputs.each(function(i, el) {
                      var $input = $(el);
                      if ($input.val() === '') {
                      $input.parent().addClass('has-error');
                      $errorMessage.removeClass('hide');
                      e.preventDefault();
                      }
                      });
                      if (!$form.data('cc-on-file')) {
                      e.preventDefault();
                      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                      Stripe.createToken({
                      number: $('.card-number').val(),
                      cvc: $('.card-cvc').val(),
                      exp_month: $('.card-expiry-month').val(),
                      exp_year: $('.card-expiry-year').val()
                      }, stripeResponseHandler);
                      }
                      });
                      function stripeResponseHandler(status, response) {
                      if (response.error) {
                      $('.error')
                      .removeClass('hide')
                      .find('.alert')
                      .text(response.error.message);
                      } else {
                      /* token contains id, last4, and card type */
                      var token = response['id'];
                      $form.find('input[type=text]').empty();
                      $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                      $form.get(0).submit();
                      }
                      }
                      });
                      </script>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                      </div>
                    </div>
                  </div>
                </div><br>
                @auth
                  @can('isSupAdmin')
                      @if (request()->get('op') == '1')
                          <form action="{{route('formations.destroy',$form->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="margin-top: 20px;font-size: 13px;color: #fff;background-color: #a12c2f;padding: 12px 30px;display: inline-block;border-radius: 22px;
                            font-weight: 500;
                            text-transform: uppercase;
                            transition: all .3s;border: 0px">Supprimer le Formation</button>
                          </form>
                      @endif
                  @endcan 
                  <br>
                  <button style="font-size: 13px;color: #fff;background-color: #a12c2f;padding: 12px 30px;display: inline-block;border-radius: 22px;
                  font-weight: 500;
                  text-transform: uppercase;
                  transition: all .3s;border: 0px" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Rejoignez la formation</button>
                @else
                  <a href="/login">S'enregistrer d'abord</a>
                  <a href="/register">Ou créer un compte</a>
                @endauth
                
                {{-- ---------------------------------------------------------------- --}}
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('fouter')
  </section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    @include('script')
</body>


  </body>

</html>
