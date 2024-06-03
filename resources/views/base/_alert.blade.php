@if (Session::has('info'))
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
   Swal.fire({
      position: 'top-end', 
      icon: '{{ Session::get('info')[0] }}', 
      title: '{{ Session::get('info')[1] }}', 
      showConfirmButton: false, 
      timer: 2000
   });
</script>
@endif