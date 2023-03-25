<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="donutChart" style="width:100%;"></canvas>
<script>
    let ctx = document.getElementById('donutChart');
    let label = [], vals = [];
    @foreach ($label as $item) label.push("{{ $item }}"); @endforeach
    @foreach ($data as $item) vals.push({{ $item }}); @endforeach
        let data = {
            labels: label,
            datasets: [{
                label: "{{ __('messages.vote') }}",
                data: vals
            }]
        };
        let config = {
            type: 'doughnut',
            data: data,
        };
        let chaassss = new Chart(ctx, config);
</script>