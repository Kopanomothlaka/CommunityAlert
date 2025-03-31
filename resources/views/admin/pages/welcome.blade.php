@extends('admin.dashboard')

@section('main-content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Alerts Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Alerts </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-exclamation-diamond"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $alertsCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Alerts Card -->

                    <!-- Meetings Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Meetings </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-arms-up"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $meetingsCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Meetings Card -->

                    <!-- Users Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Users </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $usersCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Users Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <canvas id="dashboardChart" style="height:50px;"></canvas>





                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Reports <span>/Today</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Users',
                                                data: [{{ $usersCount }}] // Data for the Users bar
                                            }, {
                                                name: 'Meetings',
                                                data: [{{ $meetingsCount }}] // Data for the Meetings bar
                                            }, {
                                                name: 'Alerts',
                                                data: [{{ $alertsCount }}] // Data for the Alerts bar
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'bar', // Using bar chart
                                                stacked: false, // Ensures bars are not stacked
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "solid", // Solid fill for bars
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: ['Category'], // Only one category label
                                            },
                                            yaxis: {
                                                title: {
                                                    text: 'Counts'
                                                }
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>



                            </div>

                        </div>
                    </div><!-- End Reports -->



                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Recent Meetings  <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">Agenda</th>
                                        <th scope="col">End Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($meetings as $meeting)
                                        <tr>
                                            <th scope="row"><a href="#">#{{ $meeting->id }}</a></th>
                                            <td>{{ $meeting->title }}</td>
                                            <td><a href="#" class="text-primary">{{ $meeting->start_time }}</a></td>
                                            <td>{{ $meeting->agenda }}</td>
                                            <td><span class="badge bg-{{ $meeting->status === 'approved' ? 'success' : ($meeting->status === 'pending' ? 'warning' : 'danger') }}">{{ ucfirst($meeting->status) }}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->


                <!-- Budget Report -->
                <div class="card">


                    <div class="card-body pb-0">
                        <h5 class="card-title">Community Alert Report </h5>

                        <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var budgetChart = echarts.init(document.querySelector("#budgetChart"));
                                budgetChart.setOption({
                                    legend: {
                                        data: ['Allocated Budget', 'Actual Spending']
                                    },
                                    radar: {
                                        // shape: 'circle', // Uncomment if you want a circular radar chart
                                        indicator: [
                                            { name: 'Users', max: 6500 },
                                            { name: 'Meetings', max: 16000 },
                                            { name: 'Alerts', max: 30000 }
                                        ]
                                    },
                                    series: [{
                                        name: 'Budget vs Spending',
                                        type: 'radar',
                                        data: [{
                                            value: [4200, 3000, 20000], // Example data for Allocated Budget
                                            name: 'Users'
                                        },
                                            {
                                                value: [5000, 14000, 28000], // Example data for Actual Spending
                                                name: 'Meetings'
                                            }]
                                    }]
                                });
                            });
                        </script>


                    </div>
                </div><!-- End Budget Report -->

                <!-- Website Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>

                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Tracking</h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [
                                            {
                                                value: {{ $usersCount }},  // Dynamic value for "Users"
                                                name: 'Users'
                                            },
                                            {
                                                value: {{ $meetingsCount }},   // Dynamic value for "Meetings"
                                                name: 'Meetings'
                                            },
                                            {
                                                value: {{ $alertsCount }},   // Dynamic value for "Alerts"
                                                name: 'Alerts'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Website Traffic -->



            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
