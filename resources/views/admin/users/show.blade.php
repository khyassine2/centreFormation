<!DOCTYPE html>
<html lang="en">

  <head>
    @include('header')
    <script src="https://kit.fontawesome.com/92a9cc2936.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets2/css/fresh-bootstrap-table.css')}}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>AL KORB</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-edu-meeting.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
<style>
  .no-records-found td{
    color: aliceblue !important;
  }
  .nav>li>a:hover{
    background: none;
  }
  ul , li{
    padding: 0;
    margin: 0;
    list-style: none;
  }
  .right-info ul li {
    display: inline-block;
    border-bottom: 1px solid rgba(250,250,250,0.15);
    margin-bottom: 30px;
    padding-bottom: 30px;
}
.right-info ul li h6 {
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 10px;
}
.right-info ul li span {
    display: block;
    font-size: 18px;
    color: #fff;
    font-weight: 700;
}
</style>
  </head>
  <body style="background-image: url('../storage/bgus.jpg') !important">
    
  @include('nav')
<section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <h3 align='center' style="color: antiquewhite">Detaill </h3><br><br>
        <div class="col-lg-4">
          <div style="
          background-color: #a12c2f;
          border-radius: 20px;
          padding: 40px;" class="right-info">
            <ul>
              <li>
                <h6>Nom et prenom :</h6>
                <span>{{$user->name}}</span>
              </li>
              <li>
                <h6>Email Address :</h6>
                <span>{{$user->email}}</span>
              </li>
              <li>
                <h6>Telephone :</h6>
                <span>{{$user->phone}}</span>
              </li>
              @if (request()->get('op') == '1')
                <li>
                  <h6>Supprimer :</h6>
                  <form action="{{route('etudiant.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="font-size: 13px;
                    color: #a12c2f;
                    background-color: #ffffff;
                    padding: 12px 30px;
                    display: inline-block;
                    border-radius: 22px;
                    font-weight: 500;
                    text-transform: uppercase;
                    transition: all .3s;">Supprimer l'etudiant</button>
                  </form>
                </li>
              @endif
            </ul>
          </div>
        </div>
        <div class="col-lg-8 align-self-center">
          <div class="row">
            @if ($user->role == 'prof')
                
            @else
                
            @endif
            
            {{-- 5555555555555555555555555555555555555555555555555555 --}}
            <div class="fresh-table full-color-orange" style="background: radial-gradient(ellipse at center, #1a2125 0%, #1a2125 100%);">
              <!--
                Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
              -->
            
              <div class="toolbar ">
                <a href="{{route('etudiant.index')}}" class="btn btn-default">Back to list etudiant</a>
                <a href="{{route('join.show',$user->id)}}" class="btn btn-default">Rejoindre la formation</a>
              </div>
              
              <table style="color: #df8628" id="fresh-table" class="table">
                <thead>
                  <th data-field="id">ID</th>
                  <th data-field="form">titre formation</th>
                  <th data-field="name">prix formation</th>
                  <th data-field="salary">date</th>
                  <th data-field="country">etat </th><th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Operation</th>
                </thead>
                <tbody>
                  @foreach ($user->use_form as $item)
                    <tr>
                      <td style="color: aliceblue">{{$item->id}}</td>
                      <td style="color: aliceblue">{{$item->formation->title}}</td>
                      <td style="color: aliceblue">{{$item->formation->prix}}</td>
                      <td style="color: aliceblue">{{$item->date}}</td>
                      <td style="color: {{$item->facture?'#20c997':'#dc3545'}}" class=""><span>{{$item->facture?'payer':'non payer'}}</span></td>
                      @if (!$item->facture)
                        <th style="color: aliceblue;align-content: center"></th>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>

                <script type="text/javascript">
                  var $table = $('#fresh-table')
                  var $alertBtn = $('#alertBtn')

                  window.operateEvents = {
                    'click .like': function (e, value, row, index) {
                    //   alert('You click like icon, row: ' + JSON.stringify(row))
                      // console.log(value, row, index)
                      var link = '{{route("facture.show",":id")}}'.replace(':id', row.id);
                      location.href = link;
                    },
                    // 'click .edit': function (e, value, row, index) {
                    //   alert('You click edit icon, row: ' + JSON.stringify(row))
                    //   console.log(value, row, index)
                    // },
                    // 'click .remove': function (e, value, row, index) {
                    //   $table.bootstrapTable('remove', {
                    //     field: 'id',
                    //     values: [row.id]
                    //   })
                    // }
                  }
                  
                  function operateFormatter(value, row, index) {
                    return [
                      '<a rel="tooltip" title="facture" class="table-action like" href="javascript:void(0)" title="facture">',
                        '<i class="fa-solid fa-receipt fa-fade"></i>',
                      '</a>'
                    ].join('')
                  }

                  $(function () {
                    $table.bootstrapTable({
                      classes: 'table table-hover table-striped',
                      toolbar: '.toolbar',

                      search: true,
                      showRefresh: true,
                      showToggle: true,
                      showColumns: true,
                      pagination: true,
                      striped: true,
                      sortable: true,
                      pageSize: 8,
                      pageList: [8, 10, 25, 50, 100],

                      formatShowingRows: function (pageFrom, pageTo, totalRows) {
                        return ''
                      },
                      formatRecordsPerPage: function (pageNumber) {
                        return pageNumber + ' rows visible'
                      }
                    })

                    $alertBtn.click(function () {
                      // 
                    })
                  })

                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   @include('fouter')
   @include('script')
  </section>
</body>
</html>