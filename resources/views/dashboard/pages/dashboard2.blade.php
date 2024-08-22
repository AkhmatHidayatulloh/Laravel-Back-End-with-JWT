@extends('dashboard.layouts.app')

@section('content')
    <div id="chart" style="width:100%; height:700px;"></div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chart = Highcharts.chart('chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Chart Transaksi'
                },
                xAxis: {
                    categories: ['Januari', 'Februari', 'Maret'],
                },
                yAxis: {
                    title: {
                        text: 'grafik'
                    }
                },
                series: [{ 
                    name: 'Transaksi Barang Masuk',
                    data: [1, 10, 4]
                }, {
                    name: 'Transaksi Barang Keluar',
                    data: [5, 7, 3]
                }]
            });
        });
 
    </script>
@endsection
