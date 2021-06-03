<script>
  $(function () {
      $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
        }
      });
    });
</script>

@stack('draggable')