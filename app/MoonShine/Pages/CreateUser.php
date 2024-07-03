<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\TextBlock;

class CreateUser extends Page
{

    protected string $title = 'Alta de usuarios'; 
    protected string $layout = 'moonshine::layouts.app';
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function getAlias(): ?string 
    {
        return 'CreateUser';
    } 


    public function layout(): string 
    {
        return $this->layout;
    } 


    public function title(): string
    {
        return $this->title ?: 'CreateUser';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array 
    {
        return [
            Grid::make([
                Column::make([
                    Block::make([
                        TextBlock::make('Title 1', 'Text 1')
                    ])
                ])->columnSpan(6),
                Column::make([
                    Block::make([
                        TextBlock::make('Title 2', 'Text 2')
                    ])
                ])->columnSpan(6),
            ])
        ];
    } 

}
