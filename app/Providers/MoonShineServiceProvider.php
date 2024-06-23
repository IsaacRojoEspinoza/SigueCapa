<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make('System', [
                MenuItem::make('Usuarios', new \Sweet1s\MoonshineRBAC\Resource\UserResource(), 'heroicons.outline.users'),
                MenuItem::make('Roles', new \Sweet1s\MoonshineRBAC\Resource\RoleResource(), 'heroicons.outline.shield-exclamation'),
                MenuItem::make('Permisos', new \Sweet1s\MoonshineRBAC\Resource\PermissionResource(), 'heroicons.outline.shield-exclamation'),
            ], 'heroicons.outline.user-group'),
            
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
{
    return [
        'colors' => [
            'primary' => 'rgb(152, 0, 91)',       // #98005B
            'secondary' => 'rgb(219, 36, 145)',   // #DB2491
            'body' => 'rgb(255, 255, 255)',       // #FFFFFF
            'dark' => [
                'DEFAULT' => 'rgb(152, 0, 91)',   // Default to primary color
                50 => 'rgb(74, 37, 92)',          // #4A255C
                100 => 'rgb(147, 91, 174)',       // #935BAE
                200 => 'rgb(201, 173, 215)',      // #C9ADD7
                300 => 'rgb(51, 51, 51)',         // #333333
                400 => 'rgb(122, 122, 122)',      // #7A7A7A
                500 => 'rgb(83, 103, 132)',
                600 => 'rgb(74, 90, 121)',
                700 => 'rgb(65, 81, 114)',
                800 => 'rgb(53, 69, 103)',
                900 => 'rgb(48, 61, 93)',
            ],

            'success-bg' => 'rgb(0, 170, 0)',
            'success-text' => 'rgb(255, 255, 255)',
            'warning-bg' => 'rgb(255, 220, 42)',
            'warning-text' => 'rgb(139, 116, 0)',
            'error-bg' => 'rgb(224, 45, 45)',
            'error-text' => 'rgb(255, 255, 255)',
            'info-bg' => 'rgb(0, 121, 255)',
            'info-text' => 'rgb(255, 255, 255)',
        ],
        'darkColors' => [
            'body' => 'rgb(27, 37, 59)',
            'success-bg' => 'rgb(17, 157, 17)',
            'success-text' => 'rgb(178, 255, 178)',
            'warning-bg' => 'rgb(225, 169, 0)',
            'warning-text' => 'rgb(255, 255, 199)',
            'error-bg' => 'rgb(190, 10, 10)',
            'error-text' => 'rgb(255, 197, 197)',
            'info-bg' => 'rgb(38, 93, 205)',
            'info-text' => 'rgb(179, 220, 255)',
        ]
    ];
}

}
