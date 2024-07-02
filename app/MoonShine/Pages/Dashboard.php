<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use App\Models\User;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\LineBreak;
use MoonShine\Decorations\TextBlock;
use MoonShine\Metrics\DonutChartMetric;
use MoonShine\Metrics\LineChartMetric;
use MoonShine\Metrics\ValueMetric;
use App\MoonShine\Resources\UserResource;


class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Pantalla Principal';

    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            LineBreak::make(),

            Grid::make([
                Column::make([
                    ValueMetric::make('Almunos Inscritos')
                        ->value(User::query()->count()),
                ])->columnSpan(6),

                Column::make([
                    ValueMetric::make('Alumnos Con Acceso a la plataforma')
                        ->value(User::query()->count()),
                ])->columnSpan(6),

                Column::make([
                    DonutChartMetric::make('Accesos')
                        ->columnSpan(6)
                        ->values(['Con acceso' => 10000, 'Sin acceso' => 3000]),
                ])->columnSpan(6),

                Column::make([
                    LineChartMetric::make('Avance Meta')
                        ->line([
                            'Avance por Entidad' => [
                                now()->format('Y-m-d') => 100,
                                now()->addDay()->format('Y-m-d') => 200
                            ]
                        ])
                        ->line([
                            'Meta por Entidad' => [
                                now()->format('Y-m-d') => 300,
                                now()->addDay()->format('Y-m-d') => 400
                            ]
                        ], '#EC4176'),
                ])->columnSpan(6)
            ]),
        ];
	}
}
