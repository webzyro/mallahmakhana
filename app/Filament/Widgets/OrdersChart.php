<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class OrdersChart extends ChartWidget
{
    protected ?string $heading = 'Orders Chart';

    protected function getData(): array
    {


         // Get last 12 months orders count grouped by month
        $orders = Order::select(
                DB::raw("DATE_FORMAT(created_at, '%b %Y') as month"),
                DB::raw("COUNT(*) as total")
            )
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderByRaw("MIN(created_at)")
            ->get();

        return [
            'labels' => $orders->pluck('month'),
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data'  => $orders->pluck('total'),
                    'fill'  => false,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
