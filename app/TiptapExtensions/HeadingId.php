<?php

namespace App\TiptapExtensions;

use Tiptap\Core\Extension;

class HeadingId extends Extension
{
    public static $name = 'headingId';

    public function addGlobalAttributes(): array
    {
        return [
            [
                'types' => ['heading'],
                'attributes' => [
                    'id' => [
                        'default' => null,
                        'parseHTML' => fn ($DOMNode) => $DOMNode->getAttribute('id'),
                        'renderHTML' => function ($attributes) {
                            $attributes = (array) $attributes;

                            return ! empty($attributes['id'])
                                ? ['id' => $attributes['id']]
                                : [];
                        },
                    ],
                ],
            ],
        ];
    }
}