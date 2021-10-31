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
    $(document).ready(function() {
        // Find District Division and Sub District
        $('#divisions').change(function() {
            let div_id = this.value;
            $.get('/get-districts?division=' + div_id, function(data) {
                $('#districts').html(data);
            })
        })
        $('#districts').change(function() {
            let dis_id = this.value;
            $.get('/get-sub-districts?district=' + dis_id, function(data) {
                $('#sub_districts').html(data);
            })
        })
        // Edit User Collection Data

        $('.edit_data_btn').click(function() {
            let data_id = $(this).data('id');
            $.get('/edit_collection_data?data_id=' + data_id, function(data) {
                $('#data__id').val(data[0].id);
                $('#datepicker').val(data[0].date);
                $('#divisions').val(data[0].division);
                $('#districts').html(`<option value='${data[0].district}'>${data[1]}</option>`);
                $('#sub_districts').html(`<option value='${data[0].sub_district}'>${data[2]}</option>`);
                $('#village_order').val(data[0].village_order);
                $('#city_order').val(data[0].city_order);
                $('#supply_order').val(data[0].supply_order);
                $('#village_supply_order').val(data[0].village_supply_order);
                $('#city_supply_order').val(data[0].city_supply_order);
                $('#product_type').val(data[0].product_type);
                $('#total_transaction').val(data[0].total_transaction);
                $('#inter_commission').val(data[0].inter_commission);
                $('#source_amount').val(data[0].source_amount);
                $('#digital_center').val(data[0].digital_center);
                $('#join_digital_center').val(data[0].join_digital_center);
                $('#trans_digital_center').val(data[0].trans_digital_center);
                $('#others_center').val(data[0].others_center);
                $('#others_center').val(data[0].others_center);
            })
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Store User Collection Data
        $('#form_submit').click(function(e) {
            e.preventDefault();
            let data_id = $('#data__id').val();
            $.ajax({
                type: 'POST',
                url: '/store_collection_data?data_id=' + data_id,
                dataType: 'JSON',
                data: {
                    date: $('#datepicker').val(),
                    division: $('#divisions').val(),
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
                },
                success: function(response) {
                $("#staticBackdrop").modal("hide")
                alert('Data Update Successfully');
                    console.log(response);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        });

        $('#table_id').DataTable();

    })
    $(function() {
        $("#datepicker").datepicker();
        $("#datepicker2").datepicker();
    });
</script>
