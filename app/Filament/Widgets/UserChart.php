<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class UserChart extends ChartWidget
{
    protected ?string $heading = 'User Chart';

    protected function getData(): array
    {

        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $users = User::query()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        // Fill missing days with 0
        $dates = collect();
        for ($date = $startOfMonth->copy(); $date <= $endOfMonth; $date->addDay()) {
            $dates->put(
                $date->format('Y-m-d'),
                $users[$date->format('Y-m-d')] ?? 0
            );
        }

        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $dates->values(),
                    'tension' => 0.4, // smooth curve
                ],
            ],
            'labels' => $dates->keys()->map(
                fn($date) =>
                Carbon::parse($date)->format('d M')
            ),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
