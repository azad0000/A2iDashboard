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
         // Find District Division and Sub District
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
         // Edit User Collection Data
        
        $('.edit_data_btn').click(function(){
                let data_id = $(this).data('id');
                $.get('/edit_collection_data?data_id='+data_id,function(data){
                        $('#data__id').val(data.id);
                        $('#datepicker').val(data.date); 
                        $('#divisions').val(data.division); 
                        $('#district').val(data.district); 
                        $('#sub_district').val(data.sub_district); 
                        $('#village_order').val(data.village_order); 
                        $('#city_order').val(data.city_order); 
                        $('#supply_order').val(data.supply_order); 
                        $('#village_supply_order').val(data.village_supply_order); 
                        $('#city_supply_order').val(data.city_supply_order); 
                        $('#product_type').val(data.product_type); 
                        $('#total_transaction').val(data.total_transaction); 
                        $('#inter_commission').val(data.inter_commission); 
                        $('#source_amount').val(data.source_amount); 
                        $('#digital_center').val(data.digital_center); 
                        $('#join_digital_center').val(data.join_digital_center); 
                        $('#trans_digital_center').val(data.trans_digital_center); 
                        $('#others_center').val(data.others_center); 
                        $('#others_center').val(data.others_center); 
                })
        })
        $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        // Store User Collection Data
        $('#form_submit').click(function(e){
                e.preventDefault();
                console.log("clicked");
                let data_id = $('#data__id').val();
                $.ajax({
                      type:'post',
                      url:'/store_collection_data?data_id='+data_id,
                      dataType:'json',
                      data:[
                        {
                                date: $('#datepicker').val(),
                                division:$('#divisions').val(),
                                district: $('#districts').val(), 
                                sub_district: $('#sub_districts').val(), 
                                village_order: $('#village_order').val(), 
                                city_order: $('#city_order').val(), 
                                supply_order: $('#supply_order').val(), 
                                village_supply_order: $('#village_supply_order').val(), 
                                city_supply_order: $('#city_supply_order').val(), 
                                product_type: $('#product_type').val(), 
                                total_transaction: $('#total_transaction').val(), 
                                inter_commission: $('#inter_commission').val(), 
                                source_amount: $('#source_amount').val(), 
                                digital_center: $('#digital_center').val(), 
                                join_digital_center: $('#join_digital_center').val(), 
                                trans_digital_center: $('#trans_digital_center').val(), 
                                others_center: $('#others_center').val(), 
                }
                      ] ,
                      success:function(response){
                              console.log("data Edit Successfully");
                      }      
                })     
        });
        
        $('#table_id').DataTable();

})
$( function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker2" ).datepicker();
} );
</script>