@extends('backend.admin.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <section 
        class="
            py-16 
            px-5
            md:py-28 
            col-span-5 
            lg:col-span-4 
            lg:pr-[70px]
            relative
            grid
            grid-cols-6
            gap-5
        "
    >
        <div class="col-span-6 lg:col-span-2 bg-white dark:bg-slate-800 rounded p-5 text-gray-200">
            <h3 class="text-xl font-semibold dark:text-gray-100 text-gray-800 mb-5">More Stats</h3>
        </div>
        <div class="col-span-6 lg:col-span-4 dark:bg-slate-800 bg-white rounded p-5 dark:text-gray-100 text-gray-800">
            <h3 class="text-xl font-semibold mb-5">Statistik</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-2 xl:grid-cols-4 gap-5">
                <div class="flex items-center">
                    <span class="bg-indigo-500/40 inline-block p-2 md:p-3 rounded-full mr-3">
                        @include(
                            'components.icons.bookOpen-regular-icon',
                            ['class' => 'w-8 md:w-10 text-indigo-500']
                        )
                    </span>
                    <div>
                        <h4 class="text-2xl font-semibold">{{ $courses }}</h4>
                        <small class="-mt-2 block text-gray-500 dark:text-gray-300">Courses</small>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="bg-emerald-500/40 inline-block p-2 md:p-3 rounded-full mr-3">
                        @include(
                            'components.icons.userGroup-regular-icon',
                            ['class' => 'w-8 md:w-10 text-emerald-500']
                        )
                    </span>
                    <div>
                        <h4 class="text-2xl font-semibold">{{ $lecturers }}</h4>
                        <small class="-mt-2 block text-gray-500 dark:text-gray-300">Lecturers</small>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="bg-yellow-500/40 inline-block p-2 md:p-3 rounded-full mr-3">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-8 md:w-10 text-yellow-500"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" 
                            />
                        </svg>
                    </span>
                    <div>
                        <h4 class="text-2xl font-semibold">{{ $students }}</h4>
                        <small class="-mt-2 block text-gray-500 dark:text-gray-300">Students</small>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="bg-red-500/40 inline-block p-2 md:p-3 rounded-full mr-3">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-8 md:w-10 text-red-500"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" 
                            />
                        </svg>
                    </span>
                    <div>
                        <h4 class="text-2xl font-semibold">{{ $classrooms }}</h4>
                        <small class="-mt-2 block text-gray-500 dark:text-gray-300">Classrooms</small>
                    </div>
                </div>
            </div>
        </div>

        {{--  --}}
        {{-- <div class="grid md:grid-cols-2 col-span-6 gap-5">
            <div class="dark:bg-slate-800 bg-white rounded p-5 dark:text-gray-100 text-gray-800">
                <div id="studentChart"></div>
            </div>
            <div class="dark:bg-slate-800 bg-white rounded p-5 dark:text-gray-100 text-gray-800">
                <div id="lecturerChart"></div>
            </div>
        </div> --}}
    </section>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var studentData = {{ json_encode($studentData)}};
        Highcharts.chart('studentChart', {
            title: {
                text: 'Student Statistik'
            },
            subtitle: {
                text: 'Tahun 2023'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Number of Student'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Student',
                data: studentData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
        
        var studentData = {{ json_encode($studentData)}};
        Highcharts.chart('lecturerChart', {
            title: {
                text: 'Lecturer Statistik'
            },
            subtitle: {
                text: 'Tahun 2023'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Number of Lecturer'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Student',
                data: studentData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
@endsection