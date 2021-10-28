<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>


<script>

$(document).ready(function(){
        $('#divisions').change(function(){
                let div_id=this.value;
                $.get('/get-districts?division='+div_id,function(data){
                        $('#districts').html(data);
                })
        })
        $('#districts').change(function(){
                let dis_id=this.value;
                $.get('/get-sub-districts?district='+dis_id,function(data){
                        $('#sub_districts').html(data);
                })
        })

        $('#table_id').DataTable();

})
$( function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker2" ).datepicker();
} );
</script>