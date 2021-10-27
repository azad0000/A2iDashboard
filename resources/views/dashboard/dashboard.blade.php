@extends('dashboard.master')
@section('content')

<style>
  .data_table{
    width: 100%;
    overflow-x: scroll;
    padding-bottom: 20px;
    margin-top: 40px
  }
  .data_table table{
    width: max-content !important;
  }
</style>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <div class="row">
              <div class="col-md-12 data_table">
                <table id="table_id" class="table table-striped display">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Division</th>
                        <th scope="col">District</th>
                        <th scope="col">Sub District</th>
                        <th scope="col">Village Order</th>
                        <th scope="col">City Order</th>
                        <th scope="col">Supply Order</th>
                        <th scope="col">Village Supply Order</th>
                        <th scope="col">City Supply Order</th>
                        <th scope="col">Product Type</th>
                        <th scope="col">Total Transaction Amount</th>
                        <th scope="col">Entrepreneur Commision</th>
                        <th scope="col">Source Amount</th>
                        <th scope="col">Digital Center</th>
                        <th scope="col">Join Digital Center</th>
                        <th scope="col">Transection Digital Center</th>
                        <th scope="col">Others Center</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($all_data as $key=>$item)
                        <tr>
                          <th scope="row">{{ $key+1 }}</th>
                          <td>{{ $item->date }}</td>
                          <td>{{ $item->divisions()->bbs_code }}</td>
                          <td>{{ $item->districts()->bbs_code}}</td>
                          <td>{{ $item->sub_districts()->bbs_code}}</td>
                          <td>{{ $item->village_order }}</td>
                          <td>{{ $item->city_order }}</td>
                          <td>{{ $item->supply_order }}</td>
                          <td>{{ $item->village_supply_order }}</td>
                          <td>{{ $item->city_supply_order }}</td>
                          <td>{{ $item->product_type }}</td>
                          <td>{{ $item->total_transaction }}</td>
                          <td>{{ $item->inter_commission }}</td>
                          <td>{{ $item->source_amount }}</td>
                          <td>{{ $item->digital_center }}</td>
                          <td>{{ $item->join_digital_center }}</td>
                          <td>{{ $item->trans_digital_center }}</td>
                          <td>{{ $item->others_center }}</td>
                        </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
            </div>
            
</div>
@endsection