</body>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/form-validation.js"></script>
<script src="<?php echo base_url();?>sbadmin2/bootstrap/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>sbadmin2/bootstrap/dist/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</html>
<script type="text/javascript">
	 $(document).ready(function () {
  $('#buscar').DataTable({
             "language": {
                 "lengthMenu": "Mostrar MENU registros por pagina",
                 "zeroRecords": "No se encontraron resultados en su busqueda",
                 "searchPlaceholder": "Buscar registros",
                 "info": "Mostrando registros de START al END de un total de  TOTAL registros",
                 "infoEmpty": "No existen registros",
                 "infoFiltered": "(filtrado de un total de MAX registros)",
                 "search": "Buscar:",
                 "paginate": {
                     "first": "Primero",
                     "last": "Último",
                     "next": "Siguiente",
                     "previous": "Anterior"
                 },
             }
        });
 })
</script>