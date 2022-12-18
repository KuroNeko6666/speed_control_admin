<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    @if ($role == 'admin')
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="statistics-details d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="statistics-title">Jumlah Admin</p>
                                            <h3 class="rate-percentage">{{ $admins }}</h3>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Jumlah Operator</p>
                                            <h3 class="rate-percentage">{{ $operators }}</h3>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Jumlah User</p>
                                            <h3 class="rate-percentage">{{ $users }}</h3>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Jumlah User Verified</p>
                                            <h3 class="rate-percentage">{{ $users_verified }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Pendaftaran User</h4>
                                                            <h5 class="card-subtitle card-subtitle-dash">Chart progress
                                                                pendaftaran user</h5>
                                                        </div>
                                                        <div id="register-user-line"></div>
                                                    </div>
                                                    <div class="chartjs-wrapper mt-5">
                                                        <canvas id="registerUserLine"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                            <div class="card bg-primary card-rounded">
                                                <div class="card-body pb-0">
                                                    <h4 class="card-title card-title-dash text-white mb-4">Status
                                                        Summary
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <p class="status-summary-ight-white mb-1">Closed Value</p>
                                                            <h2 class="text-info">357</h2>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="status-summary-chart-wrapper pb-4">
                                                                <canvas id="status-summary"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                                <div class="circle-progress-width">
                                                                    <div id="totalVisitors"
                                                                        class="progressbar-js-circle pr-2"></div>
                                                                </div>
                                                                <div>
                                                                    <p class="text-small mb-2">Total Visitors</p>
                                                                    <h4 class="mb-0 fw-bold">26.80%</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="circle-progress-width">
                                                                    <div id="visitperday"
                                                                        class="progressbar-js-circle pr-2"></div>
                                                                </div>
                                                                <div>
                                                                    <p class="text-small mb-2">Visits per day</p>
                                                                    <h4 class="mb-0 fw-bold">9065</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($role == 'operator')
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="statistics-details d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="statistics-title">Jumlah Device</p>
                                        <h3 class="rate-percentage">{{ $devices }}</h3>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Jumlah Device Active</p>
                                        <h3 class="rate-percentage">{{ $devices_active }}</h3>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Jumlah Data</p>
                                        <h3 class="rate-percentage">{{ $devices_data }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Data Device Masuk</h4>
                                                        <h5 class="card-subtitle card-subtitle-dash">Chart progress
                                                            data device</h5>
                                                    </div>
                                                    <div id="register-user-line"></div>
                                                </div>
                                                <div class="chartjs-wrapper mt-5">
                                                    <canvas id="registerUserLine"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">Status
                                                    Summary
                                                </h4>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <p class="status-summary-ight-white mb-1">Closed Value</p>
                                                        <h2 class="text-info">357</h2>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="status-summary-chart-wrapper pb-4">
                                                            <canvas id="status-summary"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                            <div class="circle-progress-width">
                                                                <div id="totalVisitors"
                                                                    class="progressbar-js-circle pr-2"></div>
                                                            </div>
                                                            <div>
                                                                <p class="text-small mb-2">Total Visitors</p>
                                                                <h4 class="mb-0 fw-bold">26.80%</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center">
                                                            <div class="circle-progress-width">
                                                                <div id="visitperday"
                                                                    class="progressbar-js-circle pr-2"></div>
                                                            </div>
                                                            <div>
                                                                <p class="text-small mb-2">Visits per day</p>
                                                                <h4 class="mb-0 fw-bold">9065</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @if ($role == 'admin')
        @if (count($data_register) > 0)
            <script>
                var graphGradient = document.getElementById("registerUserLine").getContext('2d');
                var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
                saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.18)');
                saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.02)');

                register = @json($data_register);
                data_label = Object.keys(register)
                data_register = Object.values(register)

                var salesTopData = {
                    labels: data_label.reverse(),
                    datasets: [{
                        label: 'User Mendaftar',
                        data: data_register.reverse(),
                        backgroundColor: saleGradientBg,
                        borderColor: [
                            '#1F3BB3',
                        ],
                        borderWidth: 1.5,
                        fill: true, // 3: no fill
                        pointBorderWidth: 1,
                        pointRadius: [4, 4, 4, 4, 4, 4, 4],
                        pointHoverRadius: [2, 2, 2, 2, 2, 2, 2],
                        pointBackgroundColor: ['#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3',
                            '#1F3BB3)', '#1F3BB3', '#1F3BB3'
                        ],
                        pointBorderColor: ['#fff', '#fff', '#fff', '#fff', '#fff', '#fff',
                            '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff',
                        ],
                    }]
                };

                var salesTopOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                drawBorder: false,
                                color: "#F0F0F0",
                                zeroLineColor: '#F0F0F0',
                            },
                            ticks: {
                                beginAtZero: false,
                                autoSkip: true,
                                maxTicksLimit: 4,
                                fontSize: 10,
                                color: "#6B778C"
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                beginAtZero: false,
                                autoSkip: true,
                                maxTicksLimit: 7,
                                fontSize: 10,
                                color: "#6B778C"
                            }
                        }],
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<div class="chartjs-legend"><ul>');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                            console.log(chart.data.datasets[i]); // see what's inside the obj.
                            text.push('<li>');
                            text.push('<span style="background-color:' + chart.data.datasets[i]
                                .borderColor + '">' + '</span>');
                            text.push(chart.data.datasets[i].label);
                            text.push('</li>');
                        }
                        text.push('</ul></div>');
                        return text.join("");
                    },

                    elements: {
                        line: {
                            tension: 0.4,
                        }
                    },
                    tooltips: {
                        backgroundColor: 'rgba(31, 59, 179, 1)',
                    }
                }
                var salesTop = new Chart(graphGradient, {
                    type: 'line',
                    data: salesTopData,
                    options: salesTopOptions
                });
                document.getElementById('register-user-line').innerHTML = salesTop.generateLegend();
            </script>
        @endif
    @endif
    @if ($role == 'operator')
        @if (count($data_register) > 0)
            <script>
                var graphGradient = document.getElementById("registerUserLine").getContext('2d');
                var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
                saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.18)');
                saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.02)');

                register = @json($data_register);
                data_label = Object.keys(register)
                data_register = Object.values(register)

                var salesTopData = {
                    labels: data_label.reverse(),
                    datasets: [{
                        label: 'Data Device Masuk',
                        data: data_register.reverse(),
                        backgroundColor: saleGradientBg,
                        borderColor: [
                            '#1F3BB3',
                        ],
                        borderWidth: 1.5,
                        fill: true, // 3: no fill
                        pointBorderWidth: 1,
                        pointRadius: [4, 4, 4, 4, 4, 4, 4],
                        pointHoverRadius: [2, 2, 2, 2, 2, 2, 2],
                        pointBackgroundColor: ['#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3',
                            '#1F3BB3)', '#1F3BB3', '#1F3BB3'
                        ],
                        pointBorderColor: ['#fff', '#fff', '#fff', '#fff', '#fff', '#fff',
                            '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff',
                        ],
                    }]
                };

                var salesTopOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                drawBorder: false,
                                color: "#F0F0F0",
                                zeroLineColor: '#F0F0F0',
                            },
                            ticks: {
                                beginAtZero: false,
                                autoSkip: true,
                                maxTicksLimit: 4,
                                fontSize: 10,
                                color: "#6B778C"
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                beginAtZero: false,
                                autoSkip: true,
                                maxTicksLimit: 7,
                                fontSize: 10,
                                color: "#6B778C"
                            }
                        }],
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<div class="chartjs-legend"><ul>');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                            console.log(chart.data.datasets[i]); // see what's inside the obj.
                            text.push('<li>');
                            text.push('<span style="background-color:' + chart.data.datasets[i]
                                .borderColor + '">' + '</span>');
                            text.push(chart.data.datasets[i].label);
                            text.push('</li>');
                        }
                        text.push('</ul></div>');
                        return text.join("");
                    },

                    elements: {
                        line: {
                            tension: 0.4,
                        }
                    },
                    tooltips: {
                        backgroundColor: 'rgba(31, 59, 179, 1)',
                    }
                }
                var salesTop = new Chart(graphGradient, {
                    type: 'line',
                    data: salesTopData,
                    options: salesTopOptions
                });
                document.getElementById('register-user-line').innerHTML = salesTop.generateLegend();
            </script>
        @endif
    @endif
    @endpush
</div>
