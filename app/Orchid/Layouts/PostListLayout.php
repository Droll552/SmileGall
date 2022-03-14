<?php

namespace App\Orchid\Layouts;

use App\Models\Post;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\TD;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'posts';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->sort()
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.post.edit', $post);
                }),

            TD::make('created_at', 'Created')
                ->sort(),

            TD::make('updated_at', 'Last edit')
                ->sort(),

            TD::make('title')
                ->sort()
                ->filter(Input::make())
                ->render(function (Post $post) {
                    return Link::make($post->title)->route('platform.post.edit', $post);
                }),
        ];
    }
}
