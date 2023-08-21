<!DOCTYPE html>
<html lang="en">
  @include('header')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>

   

  @include('nav')
  <!-- ***** Header Area End ***** -->
  @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <p>{{ Session::get('success') }}</p><br>
      </div>
  @endif
  
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
                  <img src="{{asset('storage/'.$form->image)}}" alt="">
                </div>
                <div class="down-content">
                  <h4>{{$form->title}}</h4>
                  <p class="description">
                    {{$form->description}}
                  </p>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="hours">
                        <h5>Hours</h5>
                        <p>Monday - Friday: 07:00 AM - 13:00 PM<br>Saturday- Sunday: 09:00 AM - 15:00 PM</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="location">
                        <h5>Location</h5>
                        <p>Recreio dos Bandeirantes, 
                        <br>Rio de Janeiro - RJ, 22795-008, Brazil</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="book now">
                        <h5>Book Now</h5>
                        <p>010-020-0340<br>090-080-0760</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button-red" style="display: flex; flex-direction: row;justify-content: space-evenly;">
                <a href="/formation">Retour à la liste des formations</a>
                {{-- ---------------------------------------------------------------- --}}
                @auth
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
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Cash</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Carte bancaire</button>
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
                          <div class="align-items-center" style="margin: auto; width: 50%">
                           <h3 style="text-align: center;margin-top: 40px;margin-bottom: 40px;"></h3>
                             <div>
                                <div class="panel panel-default credit-card-box">
                                   <div class="panel-heading" >
                                      <div class="row">
                                         <h3>Payment Details</h3>
                                         <div>                            
                                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                         </div>
                                      </div>
                                   </div>
                                   <div class="panel-body">
                                      @if (Session::has('success'))
                                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                             <p>{{ Session::get('success') }}</p><br>
                                         </div>
                                      @endif
                                      <br>
                                     <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                         @csrf
                                         <div class='form-row row'>
                                            <div class='col-xs-12 col-md-6 form-group required'>
                                               <label class='control-label'>Name on Card</label> 
                                               <input class='form-control' size='4' type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-6 form-group required'>
                                               <label class='control-label'>Card Number</label> 
                                               <input autocomplete='off' class='form-control card-number @error('number') is-invalid @enderror' name="number" size='20' type='text'>
                                            </div>                           
                                         </div>                        
                                         <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                               <label class='control-label'>CVC</label><br> 
                                               <input autocomplete='off' class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4' type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                               <label class='control-label'>Expiration Month</label> 
                                               <input class='form-control card-expiry-month' placeholder='MM' name="month" size='2' type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                               <label class='control-label'>Expiration Year</label> 
                                               <input class='form-control card-expiry-year' placeholder='YYYY' name="year" size='4' type='text'>
                                            </div>
                                         </div>
                                         @if($errors->any())
                                             @foreach($errors->all() as $error)
                                                 <div class='form-row row'>
                                                     <div class='col-md-12 error form-group hide'>
                                                         <div class='alert-danger alert'>
                                                             {{$error}}
                                                         </div>
                                                     </div>
                                                 </div>
                                             @endforeach
                                         @endif
                                       {{-- <div class='form-row row'>
                                          <div class='col-md-12 error form-group hide'>
                                             <div class='alert-danger alert'>Please correct the errors and try
                                                again.
                                             </div>
                                          </div>
                                       </div> --}}
                                         <div class="form-row row">
                                            <div class="col-xs-12">
                                               <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                            </div>
                                         </div>
                                     </form>
                                   </div>
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
                        <button class="btn btn-primary" type="submit">Pay Now (${{$form->prix}})</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                      </div>
                    </div>
                  </div>
                  <button style="margin-top: 30px;font-size: 13px;color: #fff;background-color: #a12c2f;padding: 12px 30px;display: inline-block;border-radius: 22px;
                  font-weight: 500;
                  text-transform: uppercase;
                  transition: all .3s;border: 0px" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Rejoignez la formation</button>
                  </div>
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
