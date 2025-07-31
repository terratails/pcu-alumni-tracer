@extends('layouts.app')

@section('content')
@include('component.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <div class="container vh-50" style="padding-bottom: 90px;">
    <div class="row justify-content-center" style="margin-top: 150px;">

        <!-- Daily Submissions Chart Card -->
        <div class="col-smd-6 col-lg-4 column">
            <div class="card shadow rounded" style="border: none;">
                <div class="card-header p-3" style="background: linear-gradient(60deg, #42a5f5, #1e88e5); border-top-left-radius: 1rem; border-top-right-radius: 1rem; height: 200px; position: relative;">
                    <canvas id="dailyChart"></canvas>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Tracer Activity</h5>
                    <p class="text-muted mb-2">Weekly tracer report</p>
                    <p class="text-secondary"><i class="fa fa-calendar"></i> updated {{ \Carbon\Carbon::now()->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        <!-- User Count Chart -->
        <div class="col-smd-6 col-lg-4 column">
            <div class="card shadow rounded" style="border: none;">
                <div class="card-header p-3" style="background: linear-gradient(60deg, #ec407a, #d81b60); border-top-left-radius: 1rem; border-top-right-radius: 1rem; height: 200px; position: relative;">
                    <canvas id="chart1"></canvas>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">User Count</h5>
                    <p class="text-muted mb-2">Users registered per day</p>
                    <p class="text-secondary"><i class="fa fa-clock-o"></i> updated just now</p>
                </div>
            </div>
        </div>

        <!-- Form Statistics -->
        <div class="col-smd-6 col-lg-4 column">
            <div class="card shadow rounded" style="border: none;">
                <div class="card-header p-3" style="background: linear-gradient(60deg, #66bb6a, #43a047); border-top-left-radius: 1rem; border-top-right-radius: 1rem; height: 200px; position: relative;">
                    <canvas id="chart2"></canvas>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Form Statistics</h5>
                    <p class="text-muted mb-2">Weekly User Actions</p>
                    <p class="text-secondary"><i class="fa fa-refresh"></i> updated just now</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const rawLabels = @json($last7Days->pluck('date'));
    const dataCounts = @json($last7Days->pluck('count'));

    const labels = rawLabels.map(date => {
        const d = new Date(date);
        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
    });

    const userLabels = @json($userCounts->pluck('date')->map(fn($date) => \Carbon\Carbon::parse($date)->format('M d')));
    const userData = @json($userCounts->pluck('count'));

    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                ticks: { color: '#fff' },
                grid: { display: false }
            },
            y: {
                ticks: { color: '#fff' },
                grid: { color: 'rgba(255,255,255,0.1)' },
                beginAtZero: true
            }
        },
        plugins: {
            legend: { display: false }
        }
    };

    new Chart(document.getElementById("dailyChart").getContext('2d'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Form Submissions',
                data: dataCounts,
                fill: true,
                backgroundColor: 'rgba(255,255,255,0.1)',
                borderColor: '#ffffff',
                pointBackgroundColor: '#ffffff',
                tension: 0.4,
                borderWidth: 2
            }]
        },
        options: commonOptions
    });

    new Chart(document.getElementById("chart1").getContext('2d'), {
        type: 'bar',
        data: {
            labels: userLabels,
            datasets: [{
                label: 'Users Registered',
                data: userData,
                backgroundColor: 'rgba(255, 255, 255, 0.4)',
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            ...commonOptions,
            plugins: {
                legend: {
                    labels: { color: '#fff' }
                }
            }
        }
    });

    new Chart(document.getElementById("chart2").getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Login', 'Edit Profile', 'Submit Form'],
            datasets: [{
                label: 'Activity',
                data: [120, 90, 60],
                backgroundColor: ['#ffffff80', '#ffffff60', '#ffffff40'],
                borderColor: '#ffffff',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    labels: { color: '#fff' }
                }
            },
            cutout: '60%',
            maintainAspectRatio: false
        }
    });
</script>   
</body>
</html>

@endsection
