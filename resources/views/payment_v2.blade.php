<!DOCTYPE html>
<html>
   <head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <title>How To Integrate Stripe Payment Gateway In Laravel 9 - Websolutionstuff</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      
   </head>
   <body>
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
               Show a second modal and hide this one with the button below.
             </div>
             <div class="modal-footer">
               <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
             </div>
           </div>
         </div>
       </div>
       {{-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
       <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
               <div class="container">         
                  <div class="row">
                   <h3 style="text-align: center;margin-top: 40px;margin-bottom: 40px;">How To Integrate Stripe Payment Gateway In Laravel 9 - Websolutionstuff</h3>
                     <div class="col-md-6 col-md-offset-3">
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
                              <div class="alert alert-success text-center">
                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
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
                                       <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                    </div>                           
                                 </div>                        
                                 <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                       <label class='control-label'>CVC</label> 
                                       <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                       <label class='control-label'>Expiration Month</label> 
                                       <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                       <label class='control-label'>Expiration Year</label> 
                                       <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                    </div>
                                 </div>
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
             <div class="modal-footer">
               <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
             </div>
           </div>
         </div>
       </div>
       <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">payment</button>
   </body>   
</html>