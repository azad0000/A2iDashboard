@extends('dashboard.master')
@section('content')
        <div class="card m-4 p-4">
            <div class="card-body">
                <h5 class="card-title text-center mb-4" style="font-size: 25px;font-weight:bold">Data Form</h5>

                @if ( $message = Session::get('success'))
                    <div class=" text-success">
                      {{ $message }}
                    </div>
                @endif
                <form action="{{ route('data.add') }}" method="post">
                  @csrf
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
                        <input type="number" name="village_order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="গ্রাম থেকে প্রাপ্ত অর্ডার" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="city_order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="শহর থেকে প্রাপ্ত অর্ডার" required>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="supply_order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="সরবরাহকৃত অর্ডার" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="village_supply_order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="গ্রামাঞ্চলে সরবরাহকৃত অর্ডার" required>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="city_supply_order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="শহরাঞ্চলে সরবরাহকৃত অর্ডার" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="product_type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="পণ্যের ধরণ" required>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="total_transaction" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="মোট লেনদেন (৳)" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="inter_commission" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="উদ্যোক্তা কমিশন (৳) " required>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="source_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="সোর্সিং এর পরিমাণ (৳)" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="digital_center" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="নিবন্ধিত ডিজিটাল সেন্টার" required>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="join_digital_center" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="সংযুক্ত ডিজিটাল সেন্টার" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="trans_digital_center" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="লেনদেনকারী ডিজিটাল সেন্টার" required>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" name="others_center" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="অন্যান্য সংযুক্ত সেন্টার" required>
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
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                  </form>
            </div>
        </div>
@endsection