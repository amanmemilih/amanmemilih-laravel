@if (session('success'))
  <script>
    var notify = $.notify(`<i class="fa fa-bell-o"></i><strong>Success!</strong> {{ session("success") }}`, {
        type: 'theme',
        allow_dismiss: true,
        delay: 2000,
        showProgressbar: true,
        timer: 300,
        animate:{
            enter:'animated fadeInDown',
            exit:'animated fadeOutUp'
        }
    });
  </script>
@elseif(session('errors'))
  <script>
    var notify = $.notify(`<i class="fa fa-bell-o"></i><strong>Failed!</strong> Terjadi Kesalahan.`, {
        type: 'theme',
        allow_dismiss: true,
        delay: 2000,
        showProgressbar: true,
        timer: 300,
        animate:{
            enter:'animated fadeInDown',
            exit:'animated fadeOutUp'
        }
    });
  </script>
@elseif(session('error'))
 <script>
    var notify = $.notify(`<i class="fa fa-bell-o"></i><strong>Failed!</strong> Terjadi Kesalahan.`, {
        type: 'theme',
        allow_dismiss: true,
        delay: 2000,
        showProgressbar: true,
        timer: 300,
        animate:{
            enter:'animated fadeInDown',
            exit:'animated fadeOutUp'
        }
    });
  </script>
@endif