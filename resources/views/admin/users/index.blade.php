@extends('admin/users/layout')
@section('titre','index')
@section('main')
<section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 align-self-center">
          <div class="row">
            <h3 align='center' style="color: antiquewhite">Liste des @if (request()->get('role') == 'admin')
                Admins
            @elseif(request()->get('role') == 'prof')
              Formateurs
            @else
                Etudiants
            @endif</h3><br><br>
            <div class="fresh-table full-color-orange" style="background: radial-gradient(ellipse at center, #1a2125 0%, #1a2125 100%);">
            
              <div class="toolbar ">
                <a href="{{route('etudiant.create')}}" class="btn btn-default">Ajouter User</a>
              </div>
            
              <table style="color: #df8628" id="fresh-table" class="table">
                <thead>
                  <th data-field="id">Num</th>
                  <th data-field="name">Nom & Prenom</th>
                  <th data-field="salary">email</th>
                  <th data-field="country">Date creation</th>
                  <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Operation</th>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td style="color: aliceblue">{{$user->id}}</td>
                      <td style="color: aliceblue">{{$user->name}}</td>
                      <td style="color: aliceblue">{{$user->email}}</td>
                      <td style="color: aliceblue">{{$user->created_at}}</td>
                      <td style="color: aliceblue"></td>
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
      // console.log(row);
      // link = location.href
      // tab = link.split('?')
      // location.href = tab[0]+'/'+row.id
      var link = '{{route("etudiant.show",":id")}}'.replace(':id', row.id);
      window.location.href = link;
      // alert(location.href)
      // location.href = 'http://127.0.0.1:8000/etudiant/'+row.id;
    },
    'click .edit': function (e, value, row, index) {
      // alert('You click edit icon, row: ' + JSON.stringify(row))
      // alert( row.id)
      var link = '{{route("etudiant.edit",":id")}}'.replace(':id', row.id);
      window.location.href = link;
    },
    'click .remove': function (e, value, row, index) {
      // $table.bootstrapTable('remove', {
      //   field: 'id',
      //   values: [row.id]
      // })
      // link = location.href
      // tab = link.split('?')
      // location.href = tab[0]+'/'+row.id+'?op=1'
      var link = '{{route("etudiant.show",":id")}}'.replace(':id', row.id);
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
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>

   
  </section>
@endsection