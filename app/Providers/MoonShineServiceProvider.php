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


    public function boot(): void
    {
        parent::boot();
 
        moonshineColors()
            ->background('#4A255C')
            ->content('#935BAE')
            ->tableRow('#4A255C')
            ->dividers('#AE76A6')
            ->borders('#AE76A6')
            ->buttons('#98005B')
            ->primary('#98005B')
            ->secondary('#AE76A6');  
    }
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

            MenuItem::make('Pagina de Inicio', '/admin','heroicons.outline.home') 
            ->forceActive(fn() => request()->fullUrlIs('/admin')),

            MenuGroup::make('Configuración', [
                MenuItem::make('Vocales Locales', new \Sweet1s\MoonshineRBAC\Resource\UserResource(), 'heroicons.outline.users'),
                MenuItem::make('Roles', new \Sweet1s\MoonshineRBAC\Resource\RoleResource(), 'heroicons.outline.shield-exclamation'),
                MenuItem::make('Permisos', new \Sweet1s\MoonshineRBAC\Resource\PermissionResource(), 'heroicons.outline.shield-exclamation'),
            ], 'heroicons.outline.cog-6-tooth'),

            MenuGroup::make('Movimientos', [
                MenuItem::make('Alta de usuarios', new \Sweet1s\MoonshineRBAC\Resource\UserResource(), 'heroicons.outline.user-plus'),
                MenuItem::make('Susticiones', new \Sweet1s\MoonshineRBAC\Resource\RoleResource(), 'heroicons.outline.user-group'),
                MenuItem::make('Correcion de datos', new \Sweet1s\MoonshineRBAC\Resource\PermissionResource(), 'heroicons.outline.pencil-square'),
            ], 'heroicons.outline.square-3-stack-3d'),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
{
    return [
        // 'colors' => [
        //     'primary' => 'rgb(152, 0, 91)',       // #98005B
        //     'secondary' =>  'rgb(152, 0, 91)',   // #DB2491
        //     'body' => 'rgb(255, 255, 255)',       // #FFFFFF
        //     'dark' => [
        //         'DEFAULT' => 'rgb(152, 0, 91)',   // Default to primary color
        //         50 => 'rgb(74, 37, 92)',          // #4A255C
        //         100 => 'rgb(147, 91, 174)',       // #935BAE
        //         200 => 'rgb(201, 173, 215)',      // #C9ADD7
        //         300 => 'rgb(51, 51, 51)',         // #333333
        //         400 => 'rgb(122, 122, 122)',      // #7A7A7A
        //         500 => 'rgb(83, 103, 132)',
        //         600 => 'rgb(74, 90, 121)',   
        //         700 => 'rgb(65, 81, 114)',
        //         800 => 'rgb(53, 69, 103)',
        //         900 => 'rgb(48, 61, 93)',
        //     ],

        //     'success-bg' => 'rgb(0, 170, 0)',
        //     'success-text' => 'rgb(255, 255, 255)',
        //     'warning-bg' => 'rgb(255, 220, 42)',
        //     'warning-text' => 'rgb(139, 116, 0)',
        //     'error-bg' => 'rgb(224, 45, 45)',
        //     'error-text' => 'rgb(255, 255, 255)',
        //     'info-bg' => 'rgb(0, 121, 255)',
        //     'info-text' => 'rgb(255, 255, 255)',
        // ],
        // 'darkColors' => [
        //     'body' =>'rgb(147, 91, 174)',          // #333333
        //     'success-bg' => 'rgb(147, 91, 174)',
        //     'success-text' => 'rgb(147, 91, 174)',
        //     'warning-bg' => 'rgb(147, 91, 174)',
        //     'warning-text' => 'rgb(147, 91, 174)',
        //     'error-bg' => 'rgb(147, 91, 174)',
        //     'error-text' => 'rgb(147, 91, 174)',
        //     'info-bg' => 'rgb(147, 91, 174)',
        //     'info-text' => 'rgb(147, 91, 174)',
        // ]
    ];
}

}
