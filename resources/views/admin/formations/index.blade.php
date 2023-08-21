@extends('admin/users/layout')
@section('titre','index')
@section('main')
<section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 align-self-center">
          <div class="row">
            <h3 align='center' style="color: antiquewhite">Liste des Formations</h3><br><br>
            {{-- 5555555555555555555555555555555555555555555555555555 --}}
            <div class="fresh-table full-color-orange" style="background: radial-gradient(ellipse at center, #1a2125 0%, #1a2125 100%);">
              <!--
                Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
              -->
            
              <div class="toolbar ">
                <a href="{{route('formations.create')}}" class="btn btn-default">Ajouter Formation</a>
              </div>
            
              <table style="color: #df8628" id="fresh-table" class="table">
                <thead>
                  <th data-field="id">Num</th>
                  <th data-field="name">title</th>
                  <th data-field="salary">Catigorie</th>
                  <th data-field="country">prix</th>
                  <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Operation</th>
                </thead>
                <tbody>
                  @foreach ($formations as $form)
                    <tr>
                      <td style="color: aliceblue">{{$form->id}}</td>
                      <td style="color: aliceblue">{{$form->title}}</td>
                      <td style="color: aliceblue">{{$form->categorie->titre}}</td>
                      <td style="color: aliceblue">{{$form->prix}}</td>
                      <td style="color: aliceblue">
                      </td>
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
      // console.log(row);\
      // link = location.href
      // tab = link.split('les_formations')
      // location.href = tab[0]+'formations'+'/'+row.id
      var link = '{{route("formations.show",":id")}}'.replace(':id', row.id);
      window.location.href = link;
    },
    'click .edit': function (e, value, row, index) {
      // alert('You click edit icon, row: ' + JSON.stringify(row))
      // alert( row.id)
      var link = '{{route("formations.edit",":id")}}'.replace(':id', row.id);
      window.location.href = link;
    },
    'click .remove': function (e, value, row, index) {
      // $table.bootstrapTable('remove', {
      //   field: 'id',
      //   values: [row.id]
      // })
      // link = location.href
      // tab = link.split('les_formations')
      // location.href = tab[0]+'formations'+'/'+row.id
      var link = '{{route("formations.show",":id")}}'.replace(':id', row.id);
      window.location.href = link+'?op=1';
    }
  }

  function operateFormatter(value, row, index) {
    return [
      '<a rel="tooltip" title="Detaill" class="table-action like" href="javascript:void(0)" title="Detaill">',
        '<i class="fa fa-eye"></i>',
      '</a>',
      '<a rel="tooltip" title="Modifier" class="table-action edit" href="javascript:void(0)" title="Modifier">',
        '<i class="fa fa-edit"></i>',
      '</a>',
      '<a rel="tooltip" title="Supprimer" class="table-action remove" href="javascript:void(0)" title="Supprimer">',
        '<i class="fa fa-remove"></i>',
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
            {{-- 5555555555555555555555555555555555555555555555555555 --}}
            {{-- <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr><th>Num</th><th>Nom & Prenom</th><th>Email</th><th>Date creation</th><th>Operations</th></tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr><td>{{$user->id}}</td><td>{{$user->name}}</td><td>{{$user->email}}</td><td>{{$user->created_at}}</td><td><a href="#">Detaill</a>     |     <a href="#">Modifier</a></td></tr>
                    @endforeach
                </tbody>
            </table> --}}
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>

   
  </section>
@endsection