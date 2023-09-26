@extends('dashboardMaster')
@section('content')
    <div class="content-wrapper">

        <section class="content ">
            <div class="container-fluid">


                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">كل الحجوزات المباشرة</h3>
                                
                                <div class="card-tools d-flex flex-column">
                                    <form action="{{ route('reservation.index') }}" method="get">
                                        
                                        <div class="input-group input-group-sm">
                                            <button type="submit" name="action" value="downloadReservations" class="btn btn-dark btn-sm ml-2">تحميل الملف</button>
                                            <input type="text" name="report_search" class="form-control" placeholder="Search" value="{{ request('report_search') }}">
                                            <small class="font-weight-bolder p-1">من</small>
                                            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                                            <small class="font-weight-bolder p-1">إلى</small>
                                            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                                            <div class="input-group-append">
                                                <button type="submit" name="action" value="search" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="isOffer" value="0" >
                                
                                    </form>
                                    @error('from_date')
                                    <span class="text-danger px-3">{{ $message }}</span>
                                @enderror
                                @error('to_date')
                                    <span class="text-danger px-3">{{ $message }}</span>
                                @enderror
                                </div>
                                
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>اسم العميل</th>
                                            <th>الايميل</th>
                                            <th>رقم الهاتف</th>
                                            <th>اسم الفرع</th>
                                            <th>تاريخ حجز الموعد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reservations as $reservation)
                                            <tr>
                                                <td>{{ $reservation->id }}</td>
                                                <td>{{ $reservation->customerName }}</td>
                                                <td>{{ $reservation->email }}</td>
                                                <td>{{ $reservation->phone }}</td>
                                                <td>{{ $reservation->branch->name }}</td>
                                                <td>{{ $reservation->created_at }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $reservations->links() !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">الحجوزات من خلال كل العروض</h3>
                                <div class="card-tools d-flex flex-column">
                                    <form action="{{ route('reservation.index') }}" method="get">
                                        <div class="input-group input-group-sm">
                                            <button type="submit" name="action" value="downloadoffersReservations" class="btn btn-dark btn-sm ml-2">تحميل الملف </button>
                                            <input type="text" name="offer_table_search" class="form-control" placeholder="Search" value="{{ request('offer_table_search') }}">
                                            <small class="font-weight-bolder p-1">من</small>

                                            <input type="date" name="offer_from_date" class="form-control" value="{{ request('offer_from_date') }}">
                                            <small class="font-weight-bolder p-1">إلى</small>

                                            <input type="date" name="offer_to_date" class="form-control" value="{{ request('offer_to_date') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    @error('offer_from_date')
                                        <span class="text-danger px-3">{{ $message }}</span>
                                    @enderror
                                    @error('offer_to_date')
                                        <span class="text-danger px-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>اسم العميل</th>
                                            <th>الايميل</th>
                                            <th>رقم الهاتف</th>
                                            <th>اسم الفرع</th>
                                            <th>تاريخ حجز الموعد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($offerReservations as $reservation)
                                            <tr>
                                                <td>{{ $reservation->id }}</td>
                                                <td>{{ $reservation->customerName }}</td>
                                                <td>{{ $reservation->email }}</td>
                                                <td>{{ $reservation->phone }}</td>
                                                <td>{{ $reservation->branch->name }}</td>
                                                <td>{{ $reservation->created_at }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $offerReservations->links() !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                


            </div>
    </div>

    </section>

    <!-- /.row -->
@endsection
