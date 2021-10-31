@extends('dashboard.master')
@section('content')

    <style>
        .data_table {
            width: 100%;
            overflow-x: scroll;
            padding-bottom: 20px;
            margin-top: 40px
        }

        .data_table table {
            width: max-content !important;
        }

    </style>
    <div class="container-fluid px-4">
        <h3 class="mt-4 text-center text-bold">Day To Day Data</h3>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_data as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->date }}</td>
                                <td style="text-transform:capitalize">{{ $item->division_name->name }}</td>
                                <td style="text-transform: capitalize">{{ $item->district_name->name }}</td>
                                <td style="text-transform: capitalize">{{ $item->sub_district_name->name }}</td>
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
                                <td>
                                    <button type="button" class="btn btn-primary edit_data_btn" data-bs-toggle="modal" data-id="{{ $item->id }}"
                                        data-bs-target="#staticBackdrop">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Button trigger modal -->
                    </tbody>
                </table>
                
                <!-- Edit Data Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content p-4">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form>
                              @csrf
                              <input type="hidden" id="data__id">
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="text" name="date" id="datepicker" class="form-control" placeholder="dd/mm/yy">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <select class="form-control" id="divisions" name="division">
                                      <option value="">Select Division</option>
                                      @foreach ($divisions as $item)
                                          <option value="{{ $item->bbs_code }}">{{ $item->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <select class="form-control" id="districts" name="district">
                                      <option value="">Select District</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <select class="form-control" id="sub_districts" name="sub_district">
                                      <option value="">Select Sub District</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="village_order">গ্রাম থেকে প্রাপ্ত অর্ডার</label>
                                    <input type="number" name="village_order" class="form-control" id="village_order" aria-describedby="emailHelp" placeholder="গ্রাম থেকে প্রাপ্ত অর্ডার" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="village_order">শহর থেকে প্রাপ্ত অর্ডার</label>
                                    <input type="number" name="city_order" class="form-control" id="city_order" aria-describedby="emailHelp" placeholder="শহর থেকে প্রাপ্ত অর্ডার" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">সরবরাহকৃত অর্ডার</label>
                                    <input type="number" name="supply_order" class="form-control" id="supply_order" aria-describedby="emailHelp" placeholder="সরবরাহকৃত অর্ডার" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">গ্রামাঞ্চলে সরবরাহকৃত অর্ডার</label>
                                    <input type="number" name="village_supply_order" class="form-control" id="village_supply_order" aria-describedby="emailHelp" placeholder="গ্রামাঞ্চলে সরবরাহকৃত অর্ডার" required>
                                  </div>
                                </div>
                              </div>
            
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">শহরাঞ্চলে সরবরাহকৃত অর্ডার</label>
                                    <input type="number" name="city_supply_order" class="form-control" id="city_supply_order" aria-describedby="emailHelp" placeholder="শহরাঞ্চলে সরবরাহকৃত অর্ডার" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">পণ্যের ধরণ</label>
                                    <input type="number" name="product_type" class="form-control" id="product_type" aria-describedby="emailHelp" placeholder="পণ্যের ধরণ" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">মোট লেনদেন (৳)</label>
                                    <input type="number" name="total_transaction" class="form-control" id="total_transaction" aria-describedby="emailHelp" placeholder="মোট লেনদেন (৳)" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">উদ্যোক্তা কমিশন (৳)</label>
                                    <input type="number" name="inter_commission" class="form-control" id="inter_commission" aria-describedby="emailHelp" placeholder="উদ্যোক্তা কমিশন (৳) " required>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">সোর্সিং এর পরিমাণ (৳)</label>
                                    <input type="number" name="source_amount" class="form-control" id="source_amount" aria-describedby="emailHelp" placeholder="সোর্সিং এর পরিমাণ (৳)" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">নিবন্ধিত ডিজিটাল সেন্টার</label>
                                    <input type="number" name="digital_center" class="form-control" id="digital_center" aria-describedby="emailHelp" placeholder="নিবন্ধিত ডিজিটাল সেন্টার" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">সংযুক্ত ডিজিটাল সেন্টার</label>
                                    <input type="number" name="join_digital_center" class="form-control" id="join_digital_center" aria-describedby="emailHelp" placeholder="সংযুক্ত ডিজিটাল সেন্টার" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">লেনদেনকারী ডিজিটাল সেন্টার</label>
                                    <input type="number" name="trans_digital_center" class="form-control" id="trans_digital_center" aria-describedby="emailHelp" placeholder="লেনদেনকারী ডিজিটাল সেন্টার" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">অন্যান্য সংযুক্ত সেন্টার</label>
                                    <input type="number" name="others_center" class="form-control" id="others_center" aria-describedby="emailHelp" placeholder="অন্যান্য সংযুক্ত সেন্টার" required>
                                  </div>
                                </div>
                              </div>
                                {{-- <div class="form-group mb-4">
                                  <input type="text" name="vilage_pro_trans" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="গ্রামীন পন্য লেনদেন">
                                </div>
                                <div class="form-group">
                                  <input type="text" name="union_pro_time" id="datepicker2" class="form-control" placeholder="ইউনিয়ন পন্য সরবরাহের সময়">
                                </div>
                                <div class="form-group mb-4">
                                  <input type="text" name="source_product" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="সোর্সিংকৃত পন্য">
                                </div>
                                <div class="form-group mb-4">
                                  <input type="text" name="total_dev_place" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="প্রতিষ্ঠিত মোট সেবাপ্রাপ্তির স্থান">
                                </div>
                                <div class="form-group mb-4">
                                  <input type="number" name="total_inter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="মোট উদ্যোক্তা">
                                </div>
                                <div class="form-group mb-4">
                                  <input type="number" name="total_inter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="মোট উদ্যোক্তা">
                                </div>
                                <div class="row mb-4">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <select name="gender" id="" class="form-control">
                                        <option value="">লিংগ নির্বাচন করুন</option>
                                        <option value="male">পুরুষ</option>
                                        <option value="female">মহিলা</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <input type="number" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="বয়স">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <input type="text" name="occupation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="পেশা">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <input type="text" name="total_buyer" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="মোট ক্রেতা">
                                </div> --}}
                                <button type="submit" class="btn btn-primary mt-4" id="form_submit">Submit</button>
                              </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
@endsection
